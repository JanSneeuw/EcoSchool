<?php

class Users extends CI_Controller {



	public function register(){

		$this->form_validation->set_rules('First_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('Last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Confirm_password', 'Confirm Password', 'trim|required|min_length[4]|matches[Password]');

		if ($this->form_validation->run() == false){

			$data['main_view'] = 'users/register_view';

			$this->load->view('layouts/main', $data);

		}
		else{

			if ($this->user_model->create_user()){
				$this->session->set_flashdata('user_registered', "User has been registered!");
				redirect('users/loginp');
			}else{
				if ($this->session->flashdata('register_error')){
					$this->session->set_flashdata('errors', $this->session->flashdata('register_error'));
				}else {
					$this->session->set_flashdata('errors', 'Er is iets mis gegaan, probeer het later nogmaals.');
				}
				redirect('users/register');
			}
		}
	}

	public function loginp(){
		$data['main_view'] = 'users/login_view';

		$this->load->view('layouts/main', $data);
	}

	public function login(){

		$this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Confirm_password', 'Confirm Password', 'trim|required|min_length[4]|matches[Password]');

		if($this->form_validation->run() == false){
			$data = array(
				'errors' => validation_errors()
			);

			$this->session->set_flashdata($data);

			redirect('users/loginp');
		}else{

			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			$user_id = $this->user_model->login_user($username, $password);

			if ($user_id){
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true,
					'admin' => $this->user_model->is_admin($user_id)
				);

				$this->session->set_userdata($user_data);

				$this->session->set_flashdata('success', "Je bent nu ingelogd.");

				redirect('home');

			}else{
				$this->session->set_flashdata('errors', "Kon niet inloggen, controleer je gegevens en probeer het later nogmaals.");

				redirect('users/loginp');
			}

		}
	}

	public function changePassword(){
		$this->form_validation->set_rules('currentPassword', 'currentPassword', 'trim|required', array('required' => 'Het veld voor het huidige wachtwoord is niet ingevuld.'));
		$this->form_validation->set_rules('newPassword', 'newPassword', 'trim|required', array( 'required' => 'Het veld voor het nieuwe wachtwoord is niet ingevuld.'));
		$this->form_validation->set_rules('newPasswordConf', 'newPasswordConf', 'trim|required|matches[newPassword]', array('matches' => 'De velden van het nieuwe wachtwoord komen niet overeen!', 'required' => 'Het veld voor de confirmatie van het nieuwe wachtwoord is niet ingevuld.'));

		if ($this->form_validation->run() == false){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);

			$mdata['main_view'] = 'users/my_account_view';
			$this->load->view('layouts/main', $mdata);
		}else{
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword');
			$newPasswordConf = $this->input->post('newPasswordConf');
			$success = $this->user_model->changePassword($this->session->userdata('user_id'), $currentPassword, $newPassword);
			if ($success){
				redirect('home');
			}else{
				$this->session->set_flashdata('errors', 'Er is iets mis gegaan, probeer het later nogmaals.');
				redirect('users/my_account');
			}
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	public function my_account(){
		$data['main_view'] = 'users/my_account_view';
		$this->load->view('layouts/main', $data);
	}

	public function my_recipes(){

		$data['main_view'] = 'users/my_recipes_view';
		$data['recipes'] = $this->user_model->recipesById($this->session->userdata('user_id'));
		$this->load->view('layouts/main', $data);

	}

	public function personal_advice(){
		$data['advice'] = $this->user_model->personal_advice();
		$data['score'] = $this->user_model->getScore();
		$data['main_view'] = "users/personal_advice";

		$this->load->view('layouts/main', $data);
	}

}

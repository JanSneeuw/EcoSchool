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
				redirect('home/index');
			}else{

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

			redirect('home');
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

				$this->session->set_flashdata('login_success', "You are now logged in.");

				redirect('home');

			}else{
				$this->session->set_flashdata('login_failed', "Sorry you are not logged in.");

				redirect('home');
			}

		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

}

<?php

class User_model extends CI_Model {

	public function get_users($user_id){

	}

	public function create_user(){

		$options = ['cost' =>12];

		$encrypted_pass = password_hash($this->input->post('Password'), PASSWORD_BCRYPT, $options);

		$data = array(

			'first_name' => $this->input->post('First_name'),
			'last_name' => $this->input->post('Last_name'),
			'username' => $this->input->post('Username'),
			'email' => $this->input->post('Email'),
			'password' => $encrypted_pass,
			'admin' => false

		);

		$insert_data = $this->db->insert('users', $data);

		return $insert_data;

	}

	public function login_user($username, $password){
		$this->db->where('username', $username);

		$result = $this->db->get('users');


		$db_password = $result->row(3)->password;

		if (password_verify($password, $db_password)){

			return $result->row(0)->id;

		}else{
			return false;
		}

	}

	public function is_admin($user_id){
		$this->db->where('id', $user_id);

		$result = $this->db->get('users');

		$db_admin = $result->row(6)->admin;

		if ($db_admin){
			return true;
		}else{
			return false;
		}
	}


}

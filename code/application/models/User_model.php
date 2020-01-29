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
		$row = $result->row();
		if (isset($row)){
			$db_password = $result->row(3)->password;

			if (password_verify($password, $db_password)){

				return $result->row(0)->id;

			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function changePassword($user_id, $oldPassword, $newPassword){
		$this->db->set('password', password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]));
		$this->db->where('id', $user_id);

		$result = $this->db->get('users');

		$db_password = $result->row(3)->password;
		if (password_verify($oldPassword, $db_password)){
			$this->db->set('password', password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]));
			$this->db->where('id', $user_id);

			return $this->db->update('users');
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

	public function personal_advice(){
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('user_answers');
		//$query->row(1)->answer_0;
		//Amount of persons in household
		$row = $query->row();
		if (isset($row)) {
			$person_count = $query->row(1)->answer_0;

			//Energy
			$energy_usage = $query->row(2)->answer_1;
			$green_energy = $query->row(3)->answer_2;
			$useless_energy = $query->row(4)->answer_3;
			$devices = $query->row(5)->answer_4;

			//Food
			$meat_a_week = $query->row(6)->answer_5;
			$veggie = $query->row(7)->answer_6;

			//Second use
			$second_hand = $query->row(8)->answer_7;

			//Waste management
			$waste_management = $query->row(9)->answer_8;

			//Mobile life
			$phone_life = $query->row(10)->answer_9;

			//Travling
			$car_travel = $query->row(11)->answer_10;
			$hybrid = $query->row(12)->answer_11;
			$private_usage = $query->row(13)->answer_12;

			//--Get Advice--
			$advice = array();
			if ($green_energy == 'false') {
				array_push($advice, 'Groene Energie:Je kan het wellicht overwegen groene energie op te wekken, door middel van bijvoorbeeld zonnepanelen.');
			}

			if ($useless_energy == '1' || $useless_energy == '3') {
				array_push($advice, 'Onnodig Energie Verbruik:Gebruik eens wat minder energie, zet je verwarming wat actiever uit en denk aan het niet onnodig aan laten staan van je verlichting.');
			}

			if ($devices == '2') {
				array_push($advice, 'Milieu Vriendelijke Apparaten:Overweeg eens wat extra geld in te leggen bij het kopen van een apparaat om hem wat milieu vriendelijker te maken.');
			}

			if ($meat_a_week == '4' || $meat_a_week == '5') {
				array_push($advice, 'Voedsel Gewoonten:Je eet erg veel vlees, dit is slecht voor het milieu en zou je kunnen inperken.');
			}

			if ($veggie == '0') {
				array_push($advice, 'Voedsel Gewoonten:Je eet nooit vegetarisch, overweeg dit eens en verklein je ecologische voetafdruk. Kijk voor inspiratie op onze vega recepten pagina.');
			}

			if ($second_hand == '1') {
				array_push($advice, 'Recycling:Gooi minder weg, breng het naar de kringloop of geef het aan een vriend of kennis. Hier maak je een ander blij mee, en help je het milieu, wat wil je nou nog meer?');
			} else if ($second_hand == '2') {
				array_push($advice, 'Recycling:Gooi nog minder weg, breng het naar de kringloop of geef het aan een vriend of kennis. Hier maak je een ander blij mee, en help je het milieu.');
			}

			if ($waste_management == '1') {
				array_push($advice, 'Afval Scheiding:Zoek eens op hoe je nog meer kan scheiden, het helpt het milieu enorm, al is het goed dat je iets scheidt.');
			} else if ($waste_management == '2') {
				array_push($advice, 'Afval Scheiding:Overweeg het eens om afval te scheiden, het milieu zal erg blij met je zijn.');
			}

			if ($phone_life <= 2) {
				array_push($advice, 'Telefoon Vervanging:Je doet erg kort met je telefoon, dit is slecht voor het milieu. Overweeg het wellicht je telefoon langer te houden, of een tweede-hands telefoon te kopen.');
			}

			if ($car_travel != '0' && $car_travel != '1') {
				array_push($advice, 'Reizen:Reizen met de auto is niet goed voor het milieu, kijk eens of je wellicht met het openbaarvervoer kan reizen naar je bestemming.');
			}

			if ($hybrid == '2') {
				array_push($advice, 'Reizen:Het niet volledig gebruiken van de elecktrische functie van je hybride is zonde, kijk eens of je je reis volledig elecktrisch kan rijden.');
			} else if ($hybrid == '3') {
				array_push($advice, 'Reizen:Het rijden op fosiele brandstof is erg slecht voor het milieu, overweeg het om wellicht over te stappen op een elecktrische of hybride auto.');
			}

			if (($private_usage != '0' || $private_usage != '1') && ($hybrid == '2' || $hybrid == '3')) {
				array_push($advice, 'Reizen:Je reist vrij veel op fosiele brandstof in je prive tijd, overweeg het openbaarvervoer te nemen of over stappen naar een elecktrische of hybride auto.');
			}
			//--/Get Advice--

			return $advice;
		}else{
			return null;
		}
	}

	public function getScore(){
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$query = $this->db->get('user_answers');
		$row = $query->row(14);
		if (isset($row)){
			return $row->score;
		}else{
			return null;
		}
	}

	public function recipesById($id){
		$this->db->where('adder_id', $id);
		$result = $this->db->get('recipes');
		$row = $result->row();
		if (isset($row)){
			return $result->result();
		}else{
			return null;
		}
	}


}

<?php


class Scorecalculator_model extends CI_Model
{

	public function calculate(){
		//Amount of persons in household
		$person_count = $this->input->post('0');

		//Energy
		$energy_usage = $this->input->post('1');
		$green_energy = $this->input->post('2');
		$green_energy_change = $this->input->post('3');
		$useless_energy = $this->input->post('4');
		$devices = $this->input->post('5');

		//Food
		$meat_a_week = $this->input->post('6');
		$veggie = $this->input->post('7');

		//Second use
		$second_hand = $this->input->post('8');

		//Waste management
		$waste_management = $this->input->post('9');

		//Mobile life
		$phone_life = $this->input->post('10');

		//Travling
		$car_travel = $this->input->post('11');
		$hybrid = $this->input->post('12');
		$private_usage = $this->input->post('13');

		//--Get Advice--
		$advice = array();
		if ($green_energy == 'false' && $green_energy_change == '4'){
			array_push($advice, 'Groene Energie:Je kan het wellicht overwegen groene energie op te wekken, door middel van bijvoorbeeld zonnepanelen.');
		}

		if ($useless_energy == '1' || $useless_energy == '3'){
			array_push($advice, 'Onnodig Energie Verbruik:Gebruik eens wat minder energie, zet je verwarming wat actiever uit en denk aan het niet onnodig aan laten staan van je verlichting.');
		}

		if ($devices == '2'){
			array_push($advice, 'Milieu Vriendelijke Apparaten:Overweeg eens wat extra geld in te leggen bij het kopen van een apparaat om hem wat milieu vriendelijker te maken.');
		}

		if ($meat_a_week == '4' || $meat_a_week == '5'){
			array_push($advice, 'Voedsel Gewoonten:Je eet erg veel vlees, dit is slecht voor het milieu en zou je kunnen inperken.');
		}

		if ($veggie == '0'){
			array_push($advice, 'Voedsel Gewoonten:Je eet nooit vegetarisch, overweeg dit eens en verklein je ecologische voetafdruk. Kijk voor inspiratie op onze vega recepten pagina.');
		}

		if ($second_hand == '1'){
			array_push($advice, 'Recycling:Gooi minder weg, breng het naar de kringloop of geef het aan een vriend of kennis. Hier maak je een ander blij mee, en help je het milieu, wat wil je nou nog meer?');
		}else if ($second_hand == '2'){
			array_push($advice, 'Recycling:Gooi nog minder weg, breng het naar de kringloop of geef het aan een vriend of kennis. Hier maak je een ander blij mee, en help je het milieu.');
		}

		if ($waste_management == '1'){
			array_push($advice, 'Afval Scheiding:Zoek eens op hoe je nog meer kan scheiden, het helpt het milieu enorm, al is het goed dat je iets scheidt.');
		}else if ($waste_management == '2'){
			array_push($advice,'Afval Scheiding:Overweeg het eens om afval te scheiden, het milieu zal erg blij met je zijn.');
		}

		if ($phone_life <= 2){
			array_push($advice, 'Telefoon Vervanging:Je doet erg kort met je telefoon, dit is slecht voor het milieu. Overweeg het wellicht je telefoon langer te houden, of een tweede-hands telefoon te kopen.');
		}

		if ($car_travel != '0' && $car_travel != '1'){
			array_push($advice, 'Reizen:Reizen met de auto is niet goed voor het milieu, kijk eens of je wellicht met het openbaarvervoer kan reizen naar je bestemming.');
		}

		if ($hybrid == '2'){
			array_push($advice, 'Reizen:Het niet volledig gebruiken van de elecktrische functie van je hybride is zonde, kijk eens of je je reis volledig elecktrisch kan rijden.');
		}else if ($hybrid == '3'){
			array_push($advice, 'Reizen:Het rijden op fosiele brandstof is erg slecht voor het milieu, overweeg het om wellicht over te stappen op een elecktrische of hybride auto.');
		}

		if (($private_usage != '0' || $private_usage != '1') && ($hybrid == '2' || $hybrid == '3')){
			array_push($advice, 'Reizen:Je reist vrij veel op fosiele brandstof in je prive tijd, overweeg het openbaarvervoer te nemen of over stappen naar een elecktrische of hybride auto.');
		}
		//--/Get Advice--

		$this->session->set_flashdata('score', round($this->calculateScore(), 1));
		return $advice;
	}

	public function getInput(){
		$input = array(
			'0' => $this->input->post('0'),
			'1' => $this->input->post('1'),
			'2' => $this->input->post('2'),
			'3' => $this->input->post('3'),
			'5' => $this->input->post('5'),
			'6' => $this->input->post('6'),
			'7' => $this->input->post('7'),
			'8' => $this->input->post('8'),
			'9' => $this->input->post('9'),
			'10' => $this->input->post('10'),
			'11' => $this->input->post('11'),
			'12' => $this->input->post('12'),
			'13' => $this->input->post('13'),
			'14' => $this->input->post('14')
		);
		return $input;
	}

	public function save(){
		$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'answer_0' => $this->session->flashdata('answers')[0],
			'answer_1' => $this->session->flashdata('answers')[1],
			'answer_2' => $this->session->flashdata('answers')[2],
			'answer_3' => $this->session->flashdata('answers')[3],
			'answer_4' => $this->session->flashdata('answers')[5],
			'answer_5' => $this->session->flashdata('answers')[6],
			'answer_6' => $this->session->flashdata('answers')[7],
			'answer_7' => $this->session->flashdata('answers')[8],
			'answer_8' => $this->session->flashdata('answers')[9],
			'answer_9' => $this->session->flashdata('answers')[10],
			'answer_10' => $this->session->flashdata('answers')[11],
			'answer_11' => $this->session->flashdata('answers')[12],
			'answer_12' => $this->session->flashdata('answers')[13],
			'score' => $this->session->flashdata('score')
		);
		$insert_data = $this->db->insert('user_answers', $data);

		return $insert_data;
	}

	public function calculateScore(){
		//Energy score
		$energy_usage_score = null;
		$energy_usage_10 = ['<1000', '>1000', '>1500'];
		$energy_usage_7 = ['>2000', '>2500', '>3000'];
		$energy_usage_4 = ['>3500', '>4000', '>4500'];
		$energy_usage_1 = ['>5000', '>5500'];
		if (in_array($this->input->post('1'), $energy_usage_10)){
			$energy_usage_score = 10;
		}else if (in_array($this->input->post('1'), $energy_usage_7)){
			$energy_usage_score = 7;
		}else if (in_array($this->input->post('1'), $energy_usage_4)){
			$energy_usage_score = 4;
		}else if (in_array($this->input->post('1'), $energy_usage_1)){
			$energy_usage_score = 1;
		}

		$green_energy_score = null;
		if ($this->input->post('2') == 'true'){
			$green_energy_score = 10;
		}else{
			$green_energy_score = 1;
		}

		$green_change_score = null;
		if ($this->input->post('3') == '0' || $this->input->post('3') == '1' || $this->input->post('3') == '2'){
			$green_change_score = 10;
		}else if ($this->input->post('3') == '3'){
			$green_change_score = 6;
		}else{
			$green_change_score = 1;
		}

		$waste_energy_score = null;
		if ($this->input->post('4') == '0'){
			$waste_energy_score = 10;
		}else if ($this->input->post('4') == '1'){
			$waste_energy_score = 4;
		}else if ($this->input->post('4') == '2'){
			$waste_energy_score = 7;
		}else{
			$waste_energy_score = 1;
		}

		$device_energy_score = null;
		if ($this->input->post('5') == '0'){
			$device_energy_score = 10;
		}else if ($this->input->post('5') == '1'){
			$device_energy_score = 5;
		}else{
			$device_energy_score = 1;
		}
		//--/Energy score

		//--Food score
		$meat_fish_score = null;
		if ($this->input->post('6') == '0'){
			$meat_fish_score = 10;
		}else if ($this->input->post('6') == '1'){
			$meat_fish_score = 8;
		}else if ($this->input->post('6') == '2'){
			$meat_fish_score = 6;
		}else if ($this->input->post('6') == '3'){
			$meat_fish_score = 4;
		}else if ($this->input->post('6') == '4'){
			$meat_fish_score = 2;
		}else{
			$meat_fish_score = 1;
		}

		$veggie_score = null;
		if ($this->input->post('7') == '0'){
			$veggie_score = 1;
		}else if ($this->input->post('7') == '1'){
			$veggie_score = 2;
		}else if ($this->input->post('7') == '2'){
			$veggie_score = 4;
		}else if ($this->input->post('7') == '3'){
			$veggie_score = 6;
		}else if ($this->input->post('7') == '4'){
			$veggie_score = 8;
		}else if ($this->input->post('7') == '5'){
			$veggie_score = 10;
		}
		//--/Food score

		//Waste management Score
		$thrift_score = null;
		if ($this->input->post('8') == '0'){
			$thrift_score = 10;
		}else if ($this->input->post('8') == 1){
			$thrift_score = 6;
		}else{
			$thrift_score = 1;
		}

		$waste_management_score = null;
		if ($this->input->post('9') == '0'){
			$waste_management_score = 10;
		}else if ($this->input->post('9') == '1'){
			$waste_management_score = 6;
		}else{
			$waste_management_score = 1;
		}

		$device_life_score = $this->input->post('10');
		//--/Waste management Score

		//Travel
		$work_travel_score = null;
		if ($this->input->post('11') == '0'){
			$work_travel_score = 10;
		}else if ($this->input->post('11') == '1'){
			$work_travel_score = 8;
		}else if ($this->input->post('11') == '2'){
			$work_travel_score = 6;
		}else if ($this->input->post('11') == '3'){
			$work_travel_score = 4;
		}else if ($this->input->post('11') == '4'){
			$work_travel_score = 2;
		}else{
			$work_travel_score = 1;
		}

		$hybrid_score = null;
		if ($this->input->post('12') == '0'){
			$hybrid_score = 10;
		}else if ($this->input->post('12') == '1'){
			$hybrid_score = 8;
		}else if ($this->input->post('12') == '2'){
			$hybrid_score = 4;
		}else if ($this->input->post('12') == '3'){
			$hybrid_score = 1;
		}else{
			$hybrid_score = 10;
		}

		$private_driving_score = null;
		if ($this->input->post('13') == '0'){
			$private_driving_score = 10;
		}else if ($this->input->post('13') == '1'){
			$private_driving_score = 8;
		}else if ($this->input->post('13') == '2'){
			$private_driving_score = 6;
		}else if ($this->input->post('13') == '3'){
			$private_driving_score = 4;
		}else if ($this->input->post('13') == '4'){
			$private_driving_score = 2;
		}else{
			$private_driving_score = 1;
		}

		$score = ($energy_usage_score + $green_energy_score + $green_change_score + $waste_energy_score + $device_energy_score + $meat_fish_score + $veggie_score + $thrift_score
			+ $waste_management_score + $device_life_score + $work_travel_score + $hybrid_score + $private_driving_score) / 130 * 9 + 1;
		return $score;
	}


	public function update(){
		$delete_data = $this->db->delete('user_answers', array('user_id' => $this->session->userdata('user_id')));
		return $this->save();
	}

	public function hasBeenSaved($user_id){
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('user_answers');

		if ($result->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}

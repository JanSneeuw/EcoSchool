<?php


class Scorecalculator extends CI_Controller{

	public function index(){
		$data['main_view'] = "score_calculator/index";

		$this->load->view('layouts/main', $data);
	}

	public function calculate(){
		$data['advice'] = $this->scorecalculator_model->calculate();
		$data['main_view'] = "score_calculator/personal_advice";

		if ($this->scorecalculator_model->hasBeenSaved($this->session->userdata('user_id'))){
			$this->session->set_flashdata('saved', true);
		}

		$this->session->set_flashdata('answers', $this->scorecalculator_model->getInput());

		$this->load->view('layouts/main', $data);
	}

	public function save(){
		$save = $this->scorecalculator_model->save();
		if ($save){
			redirect('users/personal_advice');
		}else{
			$this->session->set_flashdata('errors', 'Sorry, kon je advies niet opslaan.');
			redirect('scorecalculator');
		}
	}

	public function update(){
		$save = $this->scorecalculator_model->update();
		if ($save){
			redirect('users/personal_advice');
		}else{
			$this->session->set_flashdata('errors', 'Sorry, kon je advies niet opslaan.');
			redirect('scorecalculator');
		}
	}

}

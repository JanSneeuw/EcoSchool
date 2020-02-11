<?php

class Recipes extends CI_Controller {
	public function index(){

		$data['recipes'] =  $this->recipe_model->getRecipes();

		$data['main_view'] = "recipes/index";

		$this->load->view('layouts/main', $data);

	}

	public function add(){

		$this->form_validation->set_rules('Naam', 'Naam', 'trim|required|min_length[4]', array('required' => 'Een naam is vereist', 'min_length' => 'Je naam is te kort, minimaal 4 characters zijn vereist.'));
		$this->form_validation->set_rules('Beschrijving', 'Beschrijving', 'trim|required|min_length[4]|max_length[125]', array('max_length' => 'Je beschrijving is te lang, hij mag maximaal 125 characters bevatten.', 'required' => 'Een beschrijving is vereist.' , 'min_length' => 'Je beschrijving is te kort.'));
		$this->form_validation->set_rules('Benodigdheden', 'Benodigdheden', 'trim|required|min_length[4]', array('required' => 'De benodigdheden zijn vereist.', 'min_length' => 'Je benodigdheden moeten minimaal 4 characters bevatten.'));
		$this->form_validation->set_rules('Recept', 'Recept', 'trim|required|min_length[4]', array('required' => 'Het recept is vereist.', 'min_length' => 'Je recept is te kort, hij moet minimaal 4 characters bevatten.'));

		if ($this->form_validation->run() == false){

			$this->session->set_flashdata('errors', validation_errors());

			$data['main_view'] = 'recipes/index';

			$this->load->view('layouts/main', $data);

			redirect('recipes/index');

		}
		else{

			if ($this->recipe_model->create_recipe()){
				$this->session->set_flashdata('recipe_added', "Recept toegevoegd");
				redirect('recipes/index');
			}else{
				$this->session->set_flashdata('errors', 'Er is iets mis gegaan, probeer het later nogmaals.');
				redirect('recipes/index');
			}
		}
	}

	public function delete($id = null){
		if ($this->recipe_model->remove_recipe($id)){
			redirect('recipes/index');
		}else{
			$this->session->flashdata('errors', 'Er is iets mis gegaan, probeer het later nogmaals.');
			redirect('recipes/index');
		}
	}
}

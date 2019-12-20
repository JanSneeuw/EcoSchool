<?php

class Recipes extends CI_Controller {
	public function index(){

		$data['recipes'] =  $this->recipe_model->getRecipes();

		$data['main_view'] = "recipes/index";

		$this->load->view('layouts/main', $data);
	}

	public function add(){

		$this->form_validation->set_rules('Naam', 'Naam', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Beschrijving', 'Beschrijving', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Benodigdheden', 'Benodigdheden', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Recept', 'Recept', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('Foto', 'Foto', 'required');

		if ($this->form_validation->run() == false){

			$data['main_view'] = 'recipes/index';

			$this->load->view('layouts/main', $data);

		}
		else{

			if ($this->recipe_model->create_recipe()){
				$this->session->set_flashdata('recipe_added', "Recept toegevoegd");
				redirect('recipes/index');
			}else{
			}
		}
	}

	public function delete($id = null){
		if ($this->recipe_model->remove_recipe($id)){
			redirect('recipes/index');
		}
	}
}

<?php


class Recipe_model extends CI_Model {

	public function getRecipes(){
		$query = $this->db->get('recipes');

		return $query->result();
	}

	public function create_recipe(){

		$data = array(

			'name' => $this->input->post('Naam'),
			'description' => $this->input->post('Beschrijving'),
			'requirements' => $this->input->post('Benodigdheden'),
			'image' => base64_encode($this->input->post('Foto')),
			'recipe' => $this->input->post('Recept')
		);

		$insert_data = $this->db->insert('recipes', $data);

		return $insert_data;

	}

	public function remove_recipe($id){
		$delete_data = $this->db->delete('recipes', array('id' => $id));
		return $delete_data;
	}
}

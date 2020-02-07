<?php


class Recipe_model extends CI_Model
{

	public function getRecipes()
	{
		$query = $this->db->get('recipes');

		return $query->result();
	}

	public function create_recipe()
	{

		$data = array(

			'name' => $this->input->post('Naam'),
			'description' => $this->input->post('Beschrijving'),
			'requirements' => $this->input->post('Benodigdheden'),
			'recipe' => $this->input->post('Recept'),
			'image' => $this->uploadImage(),
			'adder_id' => $this->session->userdata('user_id')
		);

		$insert_data = $this->db->insert('recipes', $data);


		return $insert_data;

	}

	public function remove_recipe($id)
	{
		$query = $this->db->where('id', $id);
		$result = $this->db->get('recipes');
		$image = $result->row(4)->image;
		unlink('recipeImages/' . $image);
		$delete_data = $this->db->delete('recipes', array('id' => $id));
		return $delete_data;
	}

	private function uploadImage(){

		$config['upload_path']          = 'recipeImages/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('Foto'))
		{
			$error = array('error' => $this->upload->display_errors());
			foreach($error as $err) {echo $err;}
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

		}
		return $this->upload->data('file_name');
	}

}

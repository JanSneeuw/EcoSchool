<?php

class About_us extends CI_Controller {

	public function index(){

		$data['main_view'] = 'about_us';
		$this->load->view('layouts/main', $data);

	}

}

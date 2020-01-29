<?php

class Thrift_store extends CI_Controller {

	public function index(){
		$data['main_view'] = "thrift_store/index";
		$this->load->view('layouts/main', $data);
	}
}

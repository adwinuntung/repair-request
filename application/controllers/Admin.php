<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		if($this->session->userdata('access') != "Employee"){
		    $get_json = file_get_contents('https://server-status-tsp.firebaseapp.com/status');
		    $data['get_api'] = json_decode($get_json, true);
		}
		
    $data['title']='Dashboard';
		$this->load->view('v_admin', $data);
	}
}

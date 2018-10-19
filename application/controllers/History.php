<?php

class History extends CI_Controller{

	function __construct(){
		parent::__construct();
    $this->load->model('m_login');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    if($this->session->userdata('access') == "Employee"){
			redirect(base_url("login"));
		}

    $this->table = "repair_request";
	}

	function index()
  {
    $data['get_data'] = $this->adwincekallcase->get_all_by_id($this->table,'Selesai', 'status');
    $data['title']='History Request';
		$this->load->view('v_history', $data);
	}

}

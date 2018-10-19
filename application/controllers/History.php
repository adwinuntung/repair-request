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
		$data['filter']= '';
    $data['title']='History Request';
		$this->load->view('v_history', $data);
	}

	function filter_date()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('filter_from', 'Date From', 'required|trim');
		$this->form_validation->set_rules('filter_to', 'Date To', 'required|trim');

		if ($this->form_validation->run() === TRUE)
			{
				$data['get_data'] = $this->adwincekallcase->get_all_by_range_date($this->table,'create_date',$this->input->post('filter_from'),$this->input->post('filter_to'));

				$format_date_from = new DateTime($this->input->post('filter_from'));
				$format_date_to = new DateTime($this->input->post('filter_to'));
				$data['filter']= $format_date_from->format("d-m-Y"). '   Sampai   ' .$format_date_to->format("d-m-Y");
				$data['title']='History Request';
				$this->load->view('v_history', $data);
		}else{

			echo "<script>
			alert('Check Filter Date');
			window.location.href='".base_url('history')."';
			</script>";
		}
	}


}

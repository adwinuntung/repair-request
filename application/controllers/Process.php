<?php

class Process extends CI_Controller{

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
    $this->table_id_field = "id";
    $this->datetime = date('Y-m-d h:i:s');
	}

	function index()
  {
    $data['get_data'] = $this->adwincekallcase->get_all_not_in($this->table, "Selesai");

    $data['title']='Process Request';
		$this->load->view('v_process', $data);
	}

  function process_edit()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('user_repair', 'User Repair', 'required|trim');

      if ($this->form_validation->run() === TRUE)
      {

          $data = array (
              'user_repair' => $this->input->post('user_repair'),
              'status' => 'Proses Perbaikan',
              'process_date'=>$this->datetime
          );

          if (!$this->adwincekallcase->update_all($this->table,$this->input->post('id'),$this->table_id_field,$data))
          {
              echo "<script>
              alert('Please Check your input');
              </script>";
          }else{

              echo "<script>
              alert('Process have been Starting');
              window.location.href='".base_url('process')."';
              </script>";
          }

      }else{
          if($this->input->post('id')){
            echo "<script>
            alert('Please Check your input');
            </script>";
          }else{
              $repair_id = $this->uri->segment(3);
          }
          $data_records = array();
          if($query = $this->adwincekallcase->get_all_by_id($this->table,$repair_id,$this->table_id_field))
          {
              $data_records = $query;
          }
          $data['get_data'] = $data_records;

          $data['title']='Process Repair Request';
          $this->load->view('v_process_edit', $data);
      }
  }

  function process_done()
  {
      $repair_id = $this->uri->segment(3);
      if($repair_id){
          $data = array (
              'status' => 'Selesai',
              'done_date'=>$this->datetime
          );

          if (!$this->adwincekallcase->update_all($this->table,$repair_id,$this->table_id_field,$data))
          {
              echo "<script>
              alert('Please Check your input');
              </script>";
          }else{

              echo "<script>
              alert('Repair Done.');
              window.location.href='".base_url('process')."';
              </script>";
          }
      }else{

      }
  }
}

<?php

class Request extends CI_Controller{

	function __construct(){
		parent::__construct();
    $this->load->model('m_login');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

    $this->table = "repair_request";
    $this->datetime = date('Y-m-d h:i:s');
	}

	function index()
  {
    if($this->session->userdata('access') == "Employee"){
        $where = array(
    			'user_create' => $this->session->userdata('nama'),
  			);
        $data['get_data'] = $this->m_login->cek_login($this->table,$where);
    }else{
      $data['get_data'] = $this->m_login->get_all($this->table);
    }

    $data['link_url'] = base_url('request/add_data');
    $data['link_text'] = 'Create Request';

    $data['title']='Repair Request';
		$this->load->view('v_request', $data);
	}

  function add_data()
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
      $this->form_validation->set_rules('perangkat', 'Perangkat IT', 'required|trim');
      $this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required|trim');

      if ($this->form_validation->run() === TRUE)
      {

          $data = array (
              'kode' => $this->input->post('kode'),
              'perangkat' => $this->input->post('perangkat'),
              'kerusakan' => $this->input->post('kerusakan'),
              'status' => 'Menunggu Antrian',
              'create_date'=>$this->datetime,
              'user_create'=>$this->session->userdata('nama'),
          );

          if (!$this->adwincekallcase->insert_all($this->table,$data))
          {
              echo "<script>
              alert('Please Check your input');
              </script>";
          }else{

              // $datalog = array (
              //     'log_title'=>'Insert Produk',
              //     'datetime'=>$this->datetime,
              // );
              // $this->adwincekallcase->update_log($datalog);

              // $this->session->set_flashdata('success', 'Produk have been successfully added');
              // redirect("admin/admin_produk");
              echo "<script>
              alert('Repair Request have been successfully added');
              window.location.href='".base_url('request')."';
              </script>";
          }

      }else{
          $data['title']='Create Repair Request';
          $this->load->view('v_request_add', $data);
      }
  }
}

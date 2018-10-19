<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
    $get_user = $this->m_login->cek_login("admin",$where);
		if($cek > 0){

			$data_session = array(
        'id' => $get_user->row()->id,
				'nama' => $username,
        'access' => $get_user->row()->access,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

      if($this->session->userdata('access') != "Employee"){
          $get_json = file_get_contents('https://server-status-tsp.firebaseapp.com/status');
          $data['get_api'] = json_decode($get_json, true);
      }

      $data['title']='Dashboard';
      $this->load->view('v_admin', $data);

			// redirect(base_url("admin"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}


  private function get_data($group_access)
  {
      if($group_access == 'Manager IT'):
          $data_menu = array(
              'menu_request' => TRUE,
              'menu_process' => TRUE,
              'menu_history' => TRUE
          );
      elseif($group_access == 'Administrasi IT Support'):
        $data_menu = array(
            'menu_request' => TRUE,
            'menu_process' => TRUE,
            'menu_history' => TRUE
        );
      elseif($group_access == 'Employee'):
        $data_menu = array(
            'menu_request' => TRUE,
            'menu_process' => FALSE,
            'menu_history' => FALSE
        );
      endif;

      return $data_menu;
  }
}

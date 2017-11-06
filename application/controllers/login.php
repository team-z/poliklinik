<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
	}
	public function index()
	{
		$this->load->view('main/login');
	}
	public function action()
	{
		$where = array('user' => $this->input->post('username') ,
						'password' => $this->input->post('password') );
		$data = $this->mod->login('user',$where)->num_rows();
		if ($data > 0) {
			$data_session = array('nama' => $this->input->post('username'),
								'status' => 'login' );
			$this->session->set_userdata($data_session);
			redirect('poli/index');
		}else{
			redirect('login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
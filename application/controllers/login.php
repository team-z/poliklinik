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
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$where = array(
			'user' => $user ,
			'password' => $pass 
			);
		$data = $this->mod->login('user',$where);
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $d) {
				$data_session = array(
					'user' => $user,
					'status' => $d->status
				);

				$this->session->set_userdata($data_session);
			}
			if ($this->session->userdata('status') == 'admin') {
				redirect('admin');
			}
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
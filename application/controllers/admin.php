<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod');
		$this->load->helper('url');
		if ($this->session->userdata('status')!= 'admin') {
			redirect('login');
		}
	}
	public function index()
	{
		$data['user']=$this->mod->tampil('poli')->result();
		$this->load->view('admin/index',$data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
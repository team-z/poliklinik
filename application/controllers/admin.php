<?php

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
		
		$this->load->view('admin/index');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
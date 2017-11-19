<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		if ($this->session->userdata('status')!='kasir') {
			redirect('login');	}
	}
	public function index()
	{
		$data['kasir']=$this->mod->kasir('pembayaran')->result();
		$this->load->view('kasir/index',$data);
	}

	public function kasir($value='')
	{
		$this->load->view('input_kasir', $data, FALSE);
	}

	public function input_menu($value='')
	{
		# code..
	}

}

/* End of file kasir.php */
/* Location: ./application/controllers/kasir.php */
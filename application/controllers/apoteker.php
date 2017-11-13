<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		if ($this->session->userdata('status') != 'apotek') {
			redirect('login');
		}
	}
	public function index()
	{
		$data['user']=$this->mod->tampil('obat')->result();
		$this->load->view('apotek/data-obat',$data);
	}

}

/* End of file apoteker.php */
/* Location: ./application/controllers/apoteker.php */
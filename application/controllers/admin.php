<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod');
		$this->load->helper('url');

		if ($this->session->userdata('status') != 'admin') {
			redirect('login');
		}
	}
	public function index()
	{
		$data['user']=$this->mod->tampil('poli')->result();
		$this->load->view('admin/index',$data);
	}
	public function tambahpoli()
	{
		$object = array('nama_poli' => $this->input->post('poli') );
		$this->mod->tambah('poli',$object);
		redirect('admin');
	}

	public function updatepoli($id)
	{
		$object = array('nama_poli' => $this->input->post('poli') );
		$where = array('id_poli' => $id);
		$this->mod->update('poli',$object,$where);
		redirect('admin');
	}
	public function datadokter($id)
	{	
		$where = array('id_poli'=>$id);
		$data['user']=$this->mod->detail('dokter',$where)->result();
		$this->load->view('admin/data-dokter', $data);
	}

	public function hapus($id)
	{
		$where = array('id_poli' =>$id );
		$this->mod->delete_admin('poli',$where);
		redirect('admin/index');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
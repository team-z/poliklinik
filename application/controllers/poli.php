<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('mod');
		if($this->session->userdata('status') != "poli"){
			redirect('login');
		}
	}

	public function index()
	{
		$data['user']=$this->mod->tampil('dokter')->result();
		$this->load->view('poli/dokter',$data);
	}
	public function form()
	{
		$this->load->view('poli/input-dokter');
	}
	public function hapusdokter($id)
	{
		$where = array('id_dokter' =>$id );
		$this->mod->delete('dokter',$where);
		redirect('poli/index');
	}


	public function tambahdokter()
	{
		
		$object  = array('nama_dokter' => $this->input->post('dokter'),
							'tempat_lahir' => $this->input->post('tempat'),
							'tanggal_lahir' => $this->input->post('tanggal'),
							'bulan_lahir' => $this->input->post('bulan'),
							'tahun_lahir' => $this->input->post('tahun'),
							'alamat' => $this->input->post('alamat'),
							'no_hp' => $this->input->post('telpon'),
							'bio' => $this->input->post('bio'),
							'id_poli'=> $this->input->post('poli') );
		$this->mod->in_dok('dokter',$object);
		redirect('poli/index');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
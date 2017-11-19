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
		$data['user']=$this->mod->apotek('obat')->result();
		$this->load->view('apotek/data-obat',$data);
	}
	public function tambahobat()
	{
		$this->load->view('apotek/input-obat');
	}

	public function input()
	{
		$id = $this->mod->get_id_obat();
		if ($id) {
			$nilai = substr($id['id_obat'], 1);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "A".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "A0001";
		}
		$object = array('id_obat' => $nilai_baru2 , 
						'nama_obat' => $this->input->post('obat'),
						'type' => $this->input->post('type'),
						'kategori' => $this->input->post('kategori'),
						'stok' => $this->input->post('stok'),
						'harga_satuan' => $this->input->post('harga_satuan'),
						'foto' => $this->input->post('foto'));
		$this->mod->input_obat('obat',$object);
		redirect('apotek/data-obat');
	}

	public function del_obat($id)
	{
		$where = array('id_' =>$id );
		$this->mod->del_obat('obat',$where);
		redirect('apotek/data-obat');
	}

}

/* End of file apoteker.php */
/* Location: ./application/controllers/apoteker.php */
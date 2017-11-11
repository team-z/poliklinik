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
		$data = $this->mod->tampil('poli');
		$this->load->view('poli/input-dokter' ,array('data' => $data));
	}
	public function hapusdokter($id)
	{
		$where = array('id_dokter' =>$id );
		$this->mod->delete('dokter',$where);
		redirect('poli/index');
	}


	public function tambahdokter()
	{
		$id = $this->mod->get_id_dokter();

		if ($id) {
			$nilai = substr($id['id_dokter'], 1);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "D".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "D0001";
		}

		$object  = array(	'id_dokter' => $nilai_baru2,
							'nama_dokter' => $this->input->post('dokter'),
							'tempat_lahir' => $this->input->post('tempat'),
							'tanggal_lahir' => $this->input->post('tanggal'),
							'bulan_lahir' => $this->input->post('bulan'),
							'tahun_lahir' => $this->input->post('tahun'),
							'alamat' => $this->input->post('alamat'),
							'no_hp' => $this->input->post('telpon'),
							'bio' => $this->input->post('bio'),
							'id_poli'=> $this->input->post('poli') );
		$this->mod->tambah('dokter',$object);
		redirect('poli/index');
	}
	public function editdokterform($id)
	{
		$where = array('id_dokter' => $id);
		$data = $this->mod->detail('dokter',$where)->result();
		$this->load->view('poli/edit-dokter', array('data' => $data));
	}

	public function updatedokter($id)
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

		$where = array('id_dokter' => $id);

		$this->mod->update('dokter' ,$object ,$where);
		redirect('poli');
	}
	public function formrekam()
	{
		$this->load->view('poli/rekam-medis');
	}
	public function caripasien()
	{
		$id = $this->input->post('id');
		$w = array('id_pasien' => $id);
		$data['pasien'] = $this->mod->detail('pasien',$w)->result();
		$this->load->view('poli/form-rekam', $data);
	}



}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
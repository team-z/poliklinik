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
	public function poli()
	{
		$data['user']=$this->mod->tampil('poli')->result();
		$this->load->view('admin/index',$data);
	}
	public function tambahpoli()
	{
		$id = $this->mod->get_id_poli();

		if ($id) {
			$nilai = substr($id['id_poli'], 1);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "PL".str_pad($nilai_baru, 5, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "PL0001";
		}
		$object = array(
			'id_poli' => $nilai_baru2,
			'nama_poli' => $this->input->post('poli') );
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

	public function pasien()
	{
		$data['pasien']=$this->mod->tampil('pasien')->result();
		$this->load->view('admin/pasien',$data);

	}

	public function input_pasien()
	{
		$this->load->view('admin/tambah_pasien');
	}
	public function add_pasien()
	{
		$id = $this->mod->get_id_pasien();
		if ($id) {
			$nilai = substr($id['id_pasien'], 1);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "P".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "P0001";
		}
		$object = array('id_pasien' => $nilai_baru2 , 
						'nama_pasien' => $this->input->post('pasien'),
						'tempat_lahir' => $this->input->post('tempat'),
						'tanggal_lahir' => $this->input->post('tanggal'),
						'bulan_lahir' => $this->input->post('bulan'),
						'tahun_lahir' => $this->input->post('tahun'),
						'umur_pasien'=>$this->input->post('umur'),
						'alamat' => $this->input->post('alamat'),
						'no_hp' => $this->input->post('telpon'),
						'jenis_kelamin' => $this->input->post('gender'));
		$this->mod->tambah('pasien',$object);
		redirect('admin/pasien');

	}

	public function del_pas($id)
	{
		$where = array('id_pasien' =>$id );
		$this->mod->del_pas('pasien',$where);
		redirect('admin/pasien');
	}

	public function edit_pas($id)
	{
		$where = array('id_pasien' => $id);
		$data['pasien'] = $this->mod->detail('pasien',$where)->result();
		$this->load->view('admin/edit_pasien',$data);
	}

	public function up_pas($id)
	{
		$where = array('id_pasien' => $id);
		$object = array('id_pasien' => $nilai_baru2 , 
						'nama_pasien' => $this->input->post('pasien'),
						'tempat_lahir' => $this->input->post('tempat'),
						'tanggal_lahir' => $this->input->post('tanggal'),
						'bulan_lahir' => $this->input->post('bulan'),
						'tahun_lahir' => $this->input->post('tahun'),
						'umur_pasien'=>$this->input->post('umur'),
						'alamat' => $this->input->post('alamat'),
						'no_hp' => $this->input->post('telpon'),
						'jenis_kelamin' => $this->input->post('gender'));
		$this->mod->up_pas('pasien',$object,$where);
		redirect('admin/pasien');
	}

	public function hapuspoli($id)
	{
		$where = array('id_poli' => $id);
		$this->mod->detail('poli' ,$where);
		redirect('admin/pasien');
	}
	public function user()
	{
		$data['user']=$this->mod->tampil('user')->result();
		$this->load->view('admin/user',$data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
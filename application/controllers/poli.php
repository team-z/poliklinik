<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mod');
		if($this->session->userdata('status') != "poli"){
			redirect('login');
		}
	}
//INI SCRIPT PROSES DOKTER
	public function index()
	{
		$data['user'] = $this->mod->tampil('dokter')->result();
		$this->load->view('poli/dokter',$data);
	}
	public function form()
	{
		$this->load->view('poli/input-dokter');
	}
	public function hapusdokter($id)
	{
		$where = array('id_dokter' =>$id );
		$tampil = $this->mod->detail('dokter', $where)->result();

		foreach ($tampil as $le) {
			$gambar = $le->foto;
		}
		unlink('./uploads/'.$gambar);
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
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '5000';
		$config['max_width']  = '6000';
		$config['max_height']  = '2048';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('gambar')){
			$gambar = "";
		}
		else{
			$gambar = $this->upload->file_name;
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
							'id_poli'=> $this->input->post('poli'),
							'foto' => $gambar );
		$this->mod->tambah('dokter',$object);
		redirect('poli/index');
	}
	public function editdokterform($id)
	{
		$where = array('id_dokter' => $id);
		$data['data'] = $this->mod->detail('dokter',$where)->result();
		$this->load->view('poli/edit-dokter',$data);
	}
	public function update_image($id)
	{
		$image = $this->input->post('image');
		unlink('./uploads/'.$image);
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '6144';
		$config['max_height']  = '6144';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('gambar')){
			$gambar = "";
		}
		else{
			$gambar = $this->upload->file_name;
		}
		$where = array('id_dokter' => $id );

		$object = array('foto' => $gambar);
		$this->mod->update('dokter', $object, $where);
		redirect('poli/editdokterform/'.$id);
	}

	public function updatedokter($id)
	{
		$object  = array(	'id_dokter' => $id,
							'nama_dokter' => $this->input->post('dokter'),
							'tempat_lahir' => $this->input->post('tempat'),
							'tanggal_lahir' => $this->input->post('tanggal'),
							'bulan_lahir' => $this->input->post('bulan'),
							'tahun_lahir' => $this->input->post('tahun'),
							'alamat' => $this->input->post('alamat'),
							'no_hp' => $this->input->post('telpon'),
							'bio' => $this->input->post('bio'),
							'id_poli'=> $this->input->post('poli'),
							 );

		$where = array('id_dokter' => $id);

		$this->mod->update('dokter' ,$object ,$where);
		redirect('poli');
	}
//INI AKHIR SCRIPT PROSES DOKTER

//INI SCRIPT PROSES REKAM MEDIS
	public function formrekam()
	{
		$this->load->view('poli/rekam-medis');
	}
	public function caripasien()
	{
		$id = $this->input->get('id');
		$w = array('id_pasien' => $id);
		$data['pasien'] = $this->mod->detail('pasien',$w)->result();
		$data['rekam'] = $this->mod->detail('rekam',$w)->result();
		$this->load->view('poli/form-rekam', $data);
	}
	public function tambahrekam()
	{
		$id = $this->mod->get_id_rekam();
		$waktu = date("Y-m-d h:i:sa");
		
		if ($id) {
			$nilai = substr($id['id_rekam'], 1);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "R".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "R0001";
		}

		$object = array('id_rekam' => $nilai_baru2 ,
						'id_pasien' => $this->input->post('id_pasien'),
						'waktu' => $waktu,
						'keterangan' => $this->input->post('keterangan'));
		$this->mod->tambah('rekam',$object);
		redirect('poli/caripasien/?id='.$this->input->post('id_pasien'));
	}
//INI AKHIR SCRIPT PROSES REKAM MEDIS


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
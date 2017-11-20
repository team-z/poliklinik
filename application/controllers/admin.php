<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod');
		$this->load->helper('form','url','download');
		if ($this->session->userdata('status') != 'admin') {
			redirect('login');
		}
	}
	public function index()
	{
		$data['user']=$this->mod->tampil('poli')->result();
		$this->load->view('admin/index',$data);
	}

//INI SCRIPT PROSES PASIEN	

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
		$object = array('id_pasien' => $this->input->post('id') , 
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

//INI AKHIR SCRIPT PROSES PASIEN

//INI SCRIPT PROSES USER

	public function user()
	{
		$data['user']=$this->mod->tampil('user')->result();
		$this->load->view('admin/user',$data);
	}
	public function edituser($id)
	{
		$where = array('id' => $id );
		$data['user'] = $this->mod->detail('user',$where)->result();
		$this->load->view('admin/edit_user', $data);
	}
	public function input_user()
	{
		$this->load->view('admin/tambah_user');
	}
	public function updateuser($id)
	{
		$object  = array(
							'user' => $this->input->post('user'),
							'password' => $this->input->post('password'),
							'tanggal_lahir' => $this->input->post('tanggal'),
							'bulan_lahir' => $this->input->post('bulan'),
							'tahun_lahir' => $this->input->post('tahun'),
							'alamat' => $this->input->post('alamat'),
							'tempat_lahir' => $this->input->post('tempat'),
							'no_hp' => $this->input->post('telpon'),
							'status' => $this->input->post('status'),
							'gambar' => $this->input->post('img'),
							'nama_lengkap'=> $this->input->post('nama')
						);


		$where = array('id' => $id);

		$this->mod->update('user' ,$object ,$where);
		redirect('admin/edituser/'.$id);
	}
	public function add_user()
	{
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

		$object  = array(
							'user' => $this->input->post('user'),
							'password' => $this->input->post('password'),
							'tanggal_lahir' => $this->input->post('tanggal'),
							'bulan_lahir' => $this->input->post('bulan'),
							'tahun_lahir' => $this->input->post('tahun'),
							'alamat' => $this->input->post('alamat'),
							'tempat_lahir' => $this->input->post('tempat'),
							'no_hp' => $this->input->post('telpon'),
							'status' => $this->input->post('status'),
							'gambar' => $this->input->post('gambar'),
							'nama_lengkap'=> $this->input->post('nama'),
							'status' => $this->input->post('status'),
							'gambar' => $gambar
							 );

		$this->mod->tambah('user' ,$object);
		redirect('admin/user');
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
		$where = array('id' => $id );

		$object = array('gambar' => $gambar);
		$this->mod->update('user', $object, $where);
		redirect('admin/edituser/'.$id);
	}
	public function hapus_user($id)
	{
		$where = array('id' =>$id );
		$tampil = $this->mod->detail('user', $where)->result();

		foreach ($tampil as $le) {
			$gambar = $le->gambar;
		}
		unlink('./uploads/'.$gambar);
		$this->mod->delete('user',$where);
		redirect('admin/user');
	}

//INI AKHIR SCRIPT PROSES USER

//INI SCRIPT PROSES POLI

	public function hapuspoli($id)
	{
		$where = array('id_poli' => $id);
		$this->mod->detail('poli' ,$where);
		redirect('admin/pasien');
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
			$nilai = substr($id['id_poli'], 2);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "PL".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
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


//INI AKHIR SCRIPT PROSES POLI
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
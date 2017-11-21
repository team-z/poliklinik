<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resepsionis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form','download');	
		$this->load->library(array('upload','dompdf_gen'));
		$this->load->model('mod');
	}

	public function index()
	{
		$data['pasien'] = $this->mod->tampil('pasien')->result();
		$this->load->view('resepsionis/index',$data);
	}

	public function tambah_pasien()
	{
		$nama_pasien = $this->input->post('nama_pasien');
		$umur_pasien = $this->input->post('umur_pasien');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tahun_lahir = $this->input->post('tahun_lahir');
		$bulan_lahir = $this->input->post('bulan_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$no_hp = $this->input->post('no_hp');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');

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
						'nama_pasien' => $nama_pasien,
						'tempat_lahir' => $tempat_lahir,
						'tanggal_lahir' => $tanggal_lahir,
						'bulan_lahir' => $bulan_lahir,
						'tahun_lahir' => $tahun_lahir,
						'umur_pasien'=> $umur_pasien,
						'alamat' => $alamat,
						'no_hp' => $no_hp,
						'jenis_kelamin' => $jenis_kelamin
					);
 
		$this->db->insert('pasien', $object);
		redirect('Resepsionis/index');
	}

	public function tambah_pendaftaran()
	{
		$id = $this->mod->get_id_pendaftaran();

		if ($id) {
			$nilai = substr($id['id_pendaftaran'], 2);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "PD".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "PD0001";
		}

		$object = array('id_pendaftaran' => $nilai_baru2,
						'id_pasien' => $this->input->post('id_pasien'),
						'id_poli' => $this->input->post('id_poli'),
						'id_dokter' => $this->input->post('id_dokter'),
						'biaya' => $this->input->post('biaya'),
						'keterangan' => $this->input->post('keterangan')
					);
		
		$this->mod->tambah('pendaftaran', $object);
		$object['join'] = $this->db->query("SELECT
											pendaftaran.tanggal_pendaftaran,
											poli.nama_poli,
											dokter.nama_dokter,
											pasien.nama_pasien,
											pasien.id_pasien
											FROM
											pendaftaran
											INNER JOIN poli ON pendaftaran.id_poli = poli.id_poli
											INNER JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
											INNER JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter
											WHERE pendaftaran.id_pendaftaran='$nilai_baru2' ")->result();
		
		$this->load->view('resepsionis/cetak-res', $object);

		$paper_size  = array(0,0,500,360); //paper size ('A4')
		$orientation = 'landscape'; //tipe format kertas
		$html = $this->output->get_output();
		 
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak.pdf", array('Attachment'=>0));

		// redirect('Resepsionis/index');
	}
	// ambil_data_id
	public function ambil_data_id()
	{	
		$value = $_POST['id'];

		$a = $this->db->like('id_pasien', $value)->get('pasien')->row_array();
		echo json_encode($a);
	}
	public function ambil_data_poli($id)
	{
		$result = [];

		foreach ($this->mod->dokter($id) as $key => $value) {
			$result[$key] = $value;
		}

		echo json_encode($result);
	}

	public function cetak()
	{
		$this->load->view('resepsionis/cetak-res');
	}
}

/* End of file Resepsionis.php */
/* Location: ./application/controllers/Resepsionis.php */
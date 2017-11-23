<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library(array('upload','dompdf_gen'));
		$this->load->model('mod');
		if ($this->session->userdata('status')!='kasir') {
			redirect('login');	}
	}
	public function index()
	{
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->join('pembayaran', 'pembayaran.id_pasien = pasien.id_pasien', 'INNER');
		$this->db->join('bayar', 'bayar.id_bayar = pembayaran.id_bayar', 'INNER');
		$data['kasir'] = $this->db->get()->result();
		$this->load->view('kasir/index',$data);
	}

	public function pembayaran()
	{
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->join('pembayaran', 'pembayaran.id_pasien = pasien.id_pasien', 'INNER');
		$this->db->group_by('pembayaran.id_bayar','ASC');
		$data['kasir'] = $this->db->get()->result();
		$this->load->view('kasir/kasir',$data);
	}

	public function tebus()
	{
		$kembalian = $this->input->post('kembalian');
		if ($kembalian >= 0) {
			$status = "LUNAS";
		} else {
			$status = "BELUM LUNAS";
		}
		
		$object = array('id_bayar' => $this->input->post('id_bayar'),
						'id_pasien' => $this->input->post('id_pasien'),
						'biaya_daftar' => $this->input->post('biaya_daftar'),
						'biaya_dokter' => $this->input->post('biaya_dokter'),
						'biaya_obat' => $this->input->post('biaya_obat1'),
						'biaya_total' => $this->input->post('biaya_total1'),
						'uang_bayar' => $this->input->post('uang_bayar'),
						'kembalian' => $this->input->post('kembalian'),
						'status' =>  $status
					);
		$this->mod->tambah('bayar',$object);
		$this->load->view('kasir/struk_tebus',$object);

		$paper_size  = array(0,0,500,360); //paper size ('A4')
		$orientation = 'landscape'; //tipe format kertas
		$html = $this->output->get_output();
		 
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak struk.pdf", array('Attachment'=>0));
	}

	public function cetak_bayarlunas()
	{
		$this->db->select('*');
		$this->db->from('pasien');
		$this->db->join('pembayaran', 'pembayaran.id_pasien = pasien.id_pasien', 'INNER');
		$this->db->join('bayar', 'bayar.id_bayar = pembayaran.id_bayar', 'INNER');
		$data['kasir'] = $this->db->get()->result();
		$this->load->view('kasir/cetak_bayar', $data);

		$paper_size  = 'A4'; //paper size (array(0,0,500,360))
		$orientation = 'porttrait'; //tipe format kertas
		$html = $this->output->get_output();
		 
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_bayar.pdf", array('Attachment'=>0));
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
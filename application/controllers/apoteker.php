<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url','download');
		$this->load->library(array('upload','dompdf_gen','cart'));
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

	public function view_resep()
	{
		$data['user']=$this->mod->apotek('obat')->result();
		$this->load->view('apotek/resep',$data);
	}
	public function addresep()
	{
		$insert_data = array('id' => $this->input->post('id') ,
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'qty' => $this->input->post('jumlah'),
							 'dosis' => $this->input->post('dosis'));
		$this->cart->insert($insert_data);
		redirect('apoteker/detailresep');
	}
	public function detailresep()
	{
		$this->load->view('apotek/detailcart');
	}
	public function hapus_resep($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
			redirect('apoteker/view_resep');

		}else{
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			
			$this->cart->update($data);
			redirect('apoteker/detailresep');
		}
		
	}
	public function simpanresep()
	{
		$id = $this->mod->get_id_resep();

		if ($id) {
			$nilai = substr($id['id_resep'], 2);
			$nilai_baru = (int) $nilai;
			$nilai_baru++;
			$nilai_baru2 = "RS".str_pad($nilai_baru, 4, "0", STR_PAD_LEFT);
		}else{
			$nilai_baru2 = "RS0001";
		}
		$sub = 0;
		$cart  = $this->cart->contents();
		foreach ($cart as $key) {
			$ids = $nilai_baru2++;
			$id_obat = $key['id'];
			$id_pasien = $this->input->post('id_pasien');
			$id_bayar = $this->input->post('id_bayar');
			$jumlah = $key['qty'];
			$dosis =$key['dosis'];
			$total = $key['subtotal'];
			$sub += $total;
			$this->db->query("INSERT INTO resep (id_resep,id_obat,id_pasien,id_bayar,jumlah_obat,dosis,total_harga) VALUES('$ids','$id_obat','$id_pasien','$id_bayar','$jumlah','$dosis','$total')");
		}
		$this->db->where('id_bayar', $this->input->post('id_bayar'));
		$df = $this->db->get('pembayaran')->result();
		foreach ($df as $kk) {
			$hrgdok = $kk->biaya_dokter;
		}
		$a = 50000;
		$tot_sub = $a + $hrgdok + $sub;
		
		$where = array('id_bayar' => $this->input->post('id_bayar') );
		$data = array('biaya_obat' => $sub,
					  'total_biaya' => $tot_sub
					 );

		$this->mod->update('pembayaran',$data,$where);

		redirect('apoteker/hapus_resep/all');
		
		
	}
	public function printresep()
	{
		$this->load->view('apotek/login_resep');
	}
	public function cetakresep()
	{
		$where = $this->input->get('rb');
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pasien', 'pembayaran.id_pasien = pasien.id_pasien', 'left');
		$this->db->where('pembayaran.id_bayar', $where);
		$data['pasien'] = $this->db->get()->result();
		$this->load->view('apotek/cetak-resep',$data);
	}

	public function print_resep($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pasien', 'pembayaran.id_pasien = pasien.id_pasien', 'left');
		$this->db->where('pembayaran.id_bayar', $id);
		$data['pasien'] = $this->db->get()->result();
		$this->load->view('apotek/print_resep', $data);

		$paper_size  = array(0,0,500,430); //paper size ('A4')
		$orientation = 'landscape'; //tipe format kertas
		$html = $this->output->get_output();
		 
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak.pdf", array('Attachment'=>0));
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
		$where = array('id_obat' => $id );

		$object = array('foto' => $gambar);
		$this->mod->update('obat', $object, $where);
		redirect('apoteker/edit_ob/'.$id);
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
		$object = array('id_obat' => $nilai_baru2 , 
						'nama_obat' => $this->input->post('obat'),
						'type' => $this->input->post('type'),
						'kategori' => $this->input->post('kategori'),
						'harga_satuan' => $this->input->post('harga_satuan'),
						'foto' => $gambar
					);
				
		$this->mod->input_obat('obat',$object);
		redirect('apoteker/index');
	}

	public function edit_ob($id)
	{
		$where = array('id_obat' => $id);
		$data['obat'] = $this->mod->detail('obat',$where)->result();
		$this->load->view('apotek/edit_obat',$data);
	}

	public function edit_obat()
	{
		$id = $this->input->post('id');
		$where = array('id_obat' => $id );
		$object = array('id_obat' => $id ,
						'nama_obat' => $this->input->post('obat'),
						'type' => $this->input->post('type'),
						'kategori' => $this->input->post('kategori'),
						'harga_satuan' => $this->input->post('harga_satuan'),
						'foto' => $this->input->post('foto')
					);
		
		$this->mod->up_obat('obat',$object,$where);
		redirect('apoteker/edit_ob/'.$id);
	}

	public function hps_obat($id)
	{
		$where = array('id_obat' =>$id );
		$tampil = $this->mod->detail('obat', $where)->result();

		foreach ($tampil as $le) {
			$gambar = $le->gambar;
		}
		unlink('./uploads/'.$gambar);
		$this->mod->del_obat('obat',$where);
		redirect('apoteker');
	}

	public function cetak_obat()
	{
		$data['obat'] = $this->mod->tampil('obat')->result();
		$this->load->view('apotek/export_obat',$data);

		$paper_size  = 'A4'; //paper size (array(0,0,450,360))
		$orientation = 'portrait'; //tipe format kertas
		$html = $this->output->get_output();
		 
		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("cetak_obat.pdf", array('Attachment'=>0));
	}

}

/* End of file apoteker.php */
/* Location: ./application/controllers/apoteker.php */
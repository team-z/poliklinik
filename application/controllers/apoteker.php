<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url','download');
		$this->load->library(array('upload','dompdf_gen'));
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
		redirect('apoteker/index');
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
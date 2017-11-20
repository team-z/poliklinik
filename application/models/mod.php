<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod extends CI_Model {

	public function tampil($table)
	{
		return $this->db->get($table);
	}
	function delete($table,$where){
		$this->db->where($where);
		$this->db->delete($table); 
	}

	public function tambah($table,$object)
	{
		$this->db->insert($table,$object);
	}
	public function login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function detail($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function update($table,$object,$where)
	{
		$this->db->update($table,$object,$where);
	}
	function delete_admin($table,$where){
		$this->db->where($where);
		$this->db->delete($table); 
	}

	public function get_id_dokter()
	{
		$query = $this->db->query("SELECT MAX(id_dokter) AS id_dokter FROM dokter");
		return $query->row_array();
	}
	public function get_id_poli()
	{
		$query = $this->db->query("SELECT MAX(id_poli) AS id_poli FROM poli");
		return $query->row_array();
	}
	public function get_id_pasien()
	{
		$query = $this->db->query("SELECT MAX(id_pasien) AS id_pasien FROM pasien");
		return $query->row_array();
	}

	public function del_pas($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function up_pas($table,$object,$where)
	{
		$this->db->update($table,$object,$where);
	}
	public function get_id_rekam()
	{
		$query = $this->db->query("SELECT MAX(id_rekam) AS id_rekam FROM rekam");
		return $query->row_array();
	}

	public function get_id_pendaftaran()
	{
		$query = $this->db->query("SELECT id_pendaftaran FROM pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
		return $query->row_array();
	}

	public function kasir($table)
	{
		return $this->db->get($table);
	}
	public function apotek($table)
	{
		return $this->db->get($table);
	}

	public function input_obat($table,$object)
	{
		$this->db->insert($table,$object);
	}

	public function get_id_obat()
	{
		$query = $this->db->query("SELECT MAX(id_obat) AS id_obat FROM obat");
		return $query->row_array();
	}
	public function del_obat($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file mod.php */
/* Location: ./application/models/mod.php */
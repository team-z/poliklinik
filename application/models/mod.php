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

}

/* End of file mod.php */
/* Location: ./application/models/mod.php */
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

	public function in_dok($table,$object)
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

}

/* End of file mod.php */
/* Location: ./application/models/mod.php */
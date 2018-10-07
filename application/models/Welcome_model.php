<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('*');
		$this->db->from('namtable');
		$this->db->where('deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('namtable');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function insert()
	{
		$post = $this->input->post();
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('namatable',$post)) {
			return $this->db->insert_id();
		}else{
			return false;
		}
		
	}
	public function update($id)
	{
		$post = $this->input->post();
		$post['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('namatable',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('namatable',$post)) {
			return true;
		}else{
			return false;
		}
	}
}

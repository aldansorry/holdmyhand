<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('*');
		$this->db->from('videos');
		$this->db->where('deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('videos')->result()[0];
	}
	public function select_star()
	{
		$this->db->where('is_star',1);
		return $this->db->get('videos')->row(0);
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('videos');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function insert()
	{
		$post = $this->input->post();
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('videos',$post)) {
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
		if ($this->db->update('videos',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('videos',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function starred($id)
	{
		$this->db->update('videos',array('is_star'=>0));
		$post['is_star'] = 1;
		$this->db->where('id',$id);
		if ($this->db->update('videos',$post)) {
			return true;
		}else{
			return false;
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('customer')->result()[0];
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('customer');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function insert()
	{
		$post = $this->input->post();
		$post['password'] = md5($post['password']);
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('customer',$post)) {
			return $this->db->insert_id();
		}else{
			return false;
		}
		
	}
	public function update($id)
	{
		$post = $this->input->post();
		$post['password'] = md5($post['password']);
		$post['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('customer',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('customer',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function change_password($id)
	{
		$post['password'] = md5($this->input->post('password'));
		$post['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('customer',$post)) {
			return true;
		}else{
			return false;
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('shipment.*,employee.name,orders.no');
		$this->db->from('shipment');
		$this->db->join('orders','shipment.fk_id_orders=orders.id','left');
		$this->db->join('employee','shipment.fk_id_employee=employee.id','left');
		$this->db->where('shipment.deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('shipment')->result()[0];
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('shipment');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function get_orders()
	{
		return $this->db->where('deletedby',null)->get('orders')->result();
	}
	public function get_employee()
	{
		return $this->db->where('deletedby',null)->get('employee')->result();
	}
	public function get_service()
	{
		return $this->db->select('distinct(service)')->where('deletedby',null)->get('shipment')->result();
	}
	public function insert()
	{
		$post = $this->input->post();
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('shipment',$post)) {
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
		if ($this->db->update('shipment',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('shipment',$post)) {
			return true;
		}else{
			return false;
		}
	}
}

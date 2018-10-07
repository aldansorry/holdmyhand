<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function login_employee($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('employee');
		$data['num_rows'] = $query->num_rows();
		if ($data['num_rows'] == 1) {
			$data['result'] = $query->result_array()[0];
		}
		return $data;
	}
	public function login_customer($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('customer');
		$data['num_rows'] = $query->num_rows();
		if ($data['num_rows'] == 1) {
			$data['result'] = $query->result_array()[0];
		}
		return $data;
	}
	public function register_customer()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'telp' => $this->input->post('telp'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
		);
		$this->db->insert('customer',$data);
	}
}

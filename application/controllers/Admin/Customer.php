<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->Customer_model->select();
		$this->load->admin_template('admin/customer/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->Customer_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|is_unique[customer.name]');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required|is_unique[customer.email]');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/customer/input');
		} else {
			$this->Customer_model->insert();
			echo 'success';
		}
	}
	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['old_data'] = $this->Customer_model->select_id($id);
			$this->load->view('admin/customer/update',$data);
		} else {
			$this->Customer_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		$this->Customer_model->delete($id);
	}
}

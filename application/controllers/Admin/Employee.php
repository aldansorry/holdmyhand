<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Employee_model');
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->Employee_model->select();
		$this->load->admin_template('admin/employee/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->Employee_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|is_unique[employee.name]');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required|is_unique[employee.email]');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/employee/input');
		} else {
			$this->Employee_model->insert();
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
			$data['old_data'] = $this->Employee_model->select_id($id);
			$this->load->view('admin/employee/update',$data);
		} else {
			$this->Employee_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		$this->Employee_model->delete($id);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shipment_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$this->load->admin_template('admin/shipment/show');
	}
	public function get_data()
	{
		$data['data'] = $this->Shipment_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$data['service'] = $this->Shipment_model->get_service();
		$data['orders'] = $this->Shipment_model->get_orders();
		$data['employee'] = $this->Shipment_model->get_employee();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('service','Service','required');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('receipt','Receipt','required');
		$this->form_validation->set_rules('cost','Cost','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/shipment/input',$data);
		} else {
			$this->Shipment_model->insert();
			echo 'success';
		}
	}
	public function update($id)
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$data['service'] = $this->Shipment_model->get_service();
		$data['orders'] = $this->Shipment_model->get_orders();
		$data['employee'] = $this->Shipment_model->get_employee();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('service','Service','required');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('receipt','Receipt','required');
		$this->form_validation->set_rules('cost','Cost','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['old_data'] = $this->Shipment_model->select_id($id);
			$this->load->view('admin/shipment/update',$data);
		} else {
			$this->Shipment_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$this->Shipment_model->delete($id);
	}
}

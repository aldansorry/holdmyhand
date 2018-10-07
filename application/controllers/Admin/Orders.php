<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$this->load->admin_template('admin/orders/show');
	}
	public function report($year="all",$month = null)
	{
		$data['year'] = $year;
		$data['list_data'] = $this->Orders_model->select_report($year,$month);
		$data['list_month'] = $this->Orders_model->list_month();
		$data['list_year'] = $this->Orders_model->list_year();
		$this->load->admin_template('admin/orders/report',$data);
	}
	
	public function get_data()
	{
		$data['data'] = $this->Orders_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$data['customer'] = $this->Orders_model->get_customer();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date','Date','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/orders/input',$data);
		} else {
			$this->Orders_model->insert();
			echo 'success';
		}
	}
	public function update($id)
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$data['customer'] = $this->Orders_model->get_customer();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('date','Date','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['old_data'] = $this->Orders_model->select_id($id);
			$this->load->view('admin/orders/update',$data);
		} else {
			$this->Orders_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		if ($this->session->userdata('level') != '1') {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
		$this->Orders_model->delete($id);
	}
}

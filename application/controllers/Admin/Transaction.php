<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders_model');
		$this->load->model('Shipment_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$this->load->admin_template('admin/transaction/orders');
	}
	public function get_data_order()
	{
		$where = array(
			'shipment.id' => null
		);
		$data['data'] = $this->Orders_model->select($where);
		echo json_encode($data);
	}
	public function shipment($id)
	{
		$data['product'] = $this->Orders_model->select_detail($id);
		$data['orders'] = $this->Orders_model->select_id($id);
		$data['service'] = $this->Shipment_model->get_service();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('service','Service','required');
		$this->form_validation->set_rules('date','Date','required');
		$this->form_validation->set_rules('receipt','Receipt','required');
		$this->form_validation->set_rules('cost','Cost','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/transaction/shipment',$data);
		} else {
			$this->Shipment_model->insert();
			echo 'success';
		}
	}
}

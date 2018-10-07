<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index($year= null)
	{
		$data['orders'] = $this->Dashboard_model->orders();
		$data['orders_detail'] = $this->Dashboard_model->orders_detail();
		$data['product'] = $this->Dashboard_model->product();
		$data['customer'] = $this->Dashboard_model->customer();
		$data['employee'] = $this->Dashboard_model->employee();
		$data['profit'] = $this->Dashboard_model->profit($year);
		$this->load->admin_template('admin/home',$data);
	}
	public function json_chart()
	{
		$data['jsonarray'] = $this->Dashboard_model->profit();
		echo json_encode($data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders_model');
		if ($this->session->userdata('name') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$data['orders_total'] = $this->Orders_model->num_rows(array('fk_id_customer'=>$this->session->userdata('id')));
		$data['orders_shipment'] = $this->Orders_model->num_rows(array('fk_id_customer'=>$this->session->userdata('id'),'shipment.service !='=>null));
		$this->load->user_template('user/user_page/home',$data);
	}
}

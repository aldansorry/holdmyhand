<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Orders_model');
		if ($this->session->userdata('name') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		echo "halo";
	}
	public function orders()
	{
		if (count($this->cart->contents()) == null) {
			echo "failed";
		}else{
			$orders_id = $this->Orders_model->insert('cart');
			$cart = $this->cart->contents();
			foreach ($cart as $key => $value) {
				$set = array(
					'fk_id_product_stock' => $value['id'],
					'quantity' => $value['qty']
				);
				$this->Orders_model->insert_detail($orders_id,$set);
			}
			$this->cart->destroy();
			echo "success";
		}
	}
}

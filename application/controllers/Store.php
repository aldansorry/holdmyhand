<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Slideshow_model');
		$this->load->model('News_model');
	}
	
	public function index()
	{
		$data = $this->Product_model->datalist();
		$data['product'] = $this->Product_model->select_availible();
		$this->load->user_template('user/store',$data);
	}
	public function search($word = false)
	{
		if ($word) {
			$data['product'] = $this->Product_model->search($word);
		}else{
			$data['product'] = $this->Product_model->select_availible();
		}
		$this->load->view('user/product/show',$data);
		
	}
	public function detail($id)
	{
		$data['product'] = $this->Product_model->select_id($id);
		$data['product_image'] = $this->Product_model->show_product_image($id);
		$where = array(
			'stock >'=> 0
		);
		$data['product_stock'] = $this->Product_model->show_product_stock($id,$where);
		$this->load->view('user/product/detail',$data);
	}
}

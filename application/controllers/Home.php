<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Slideshow_model');
		$this->load->model('News_model');
		$this->load->model('Videos_model');
	}
	
	public function index()
	{
		$data['slideshow'] = $this->Slideshow_model->select();
		$data['news'] = $this->News_model->select_recent();
		$data['product'] = $this->Product_model->select_featured();
		$data['star_video'] = $this->Videos_model->select_star();
		$this->load->user_template('user/home',$data);
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

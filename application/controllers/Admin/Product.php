<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->Product_model->select();
		$this->load->admin_template('admin/product/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->Product_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('color','Color','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['datalist'] = $this->Product_model->datalist();
			$this->load->view('admin/product/input',$data);
		} else {
			$this->Product_model->insert();
			echo 'success';
		}
	}
	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('color','Color','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['datalist'] = $this->Product_model->datalist();
			$data['old_data'] = $this->Product_model->select_id($id);
			$this->load->view('admin/product/update',$data);
		} else {
			$this->Product_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		$this->Product_model->delete($id);
	}

	public function detail($id)
	{
		$data['fk_id_product'] = $id;
		$data['product_stock'] = $this->Product_model->show_product_stock($id);
		$this->load->view('admin/product/detail',$data);
	}

	public function detail_input($id)
	{
		$data['product_stock'] = $this->Product_model->show_product_stock($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('size','Size','required');
		$this->form_validation->set_rules('stock','Stock','required');
		$this->form_validation->set_rules('price','Price','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/product/detail',$data);
		} else {
			$this->Product_model->detail_insert($id);
			echo 'success';
		}
	}
	public function detail_update($id)
	{
		$this->Product_model->detail_update($id);
	}
	public function detail_delete($id)
	{
		$this->Product_model->detail_delete($id);
	}


	public function image_show($id)
	{
		$data['id_product'] = $id;
		$data['img'] = $this->Product_model->show_product_image($id);
		$this->load->view('admin/product/image',$data);
	}
	public function image_delete($id)
	{
		$this->Product_model->image_delete($id);
	}
	public function image_insert($id)
	{
		if ($this->Product_model->rows_product_image($id) < 5) {
			$upload = $this->Product_model->insert_product_image($id);
			if($upload['result'] == 'success'){
				echo "success";
			}else{
				echo $upload['error'];
			}
		}else{
			echo "Allow only 5 image per product";
		}
	}
}

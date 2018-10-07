<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}
	public function index()
	{
		$this->load->view('user/cart');
	}
	public function insert()
	{
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => ($this->input->post('qty')<=$this->input->post('stock') ? $this->input->post('qty') : $this->input->post('stock')),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'size' 	  => $this->input->post('size'),
			'max' => $this->input->post('stock')
		);
		$this->cart->insert($data);
		echo "success";
	}
	public function update()
	{
		$data = array();
		foreach ($this->input->post() as $key => $value) {
			$value['qty'] = ($value['qty'] <= $value['max'] ? $value['qty'] : $value['max']);
			$data[] = $value;
		}
		$this->cart->update($data);
		redirect('Cart');
	}
	public function remove($rowid)			
	{
		$this->cart->remove($rowid);
		redirect('Cart');
	}
}

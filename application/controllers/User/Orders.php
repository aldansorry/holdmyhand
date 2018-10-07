<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Orders_model');
		$this->load->library('pdf');
		if ($this->session->userdata('name') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$where = array(
			'fk_id_customer' => $this->session->userdata('id')
		);
		$data['orders'] = $this->Orders_model->select($where);
		$this->load->user_template('user/user_page/orders',$data);
	}
	function print_pdf($id){
		$data['biodatabuilder_object'] =
		$this->pdf->load_view('admin/v_laporan',$data);
		$this->pdf->render();
		$this->pdf->stream("data-biodata-mahasiswa.pdf");
	}

}

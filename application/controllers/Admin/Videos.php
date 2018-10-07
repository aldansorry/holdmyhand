<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Videos_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->Videos_model->select();
		$this->load->admin_template('admin/videos/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->Videos_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('embed_url','Embed URL','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/videos/input');
		} else {
			$this->Videos_model->insert();
			echo 'success';
		}
	}
	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('embed_url','Embed URL','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$data['old_data'] = $this->Videos_model->select_id($id);
			$this->load->view('admin/videos/update',$data);
		} else {
			$this->Videos_model->update($id);
			echo 'success';
		}
		
	}
	public function delete($id)
	{
		$this->Videos_model->delete($id);
	}
	public function starred($id)
	{
		$this->Videos_model->starred($id);
		redirect('Admin/Videos','refresh');
	}
}

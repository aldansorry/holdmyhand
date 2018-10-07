<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->News_model->select();
		$this->load->admin_template('admin/news/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->News_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('content','Content','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->admin_template('admin/news/input');
		} else {
			$upload = $this->News_model->upload();
			if($upload['result'] == "success"){ 
				$this->News_model->insert($upload['file']['file_name']);
				redirect('Admin/News');
			}else{
				$data['message'] = $upload['error'];
				$this->load->admin_template('admin/news/input',$data); 
			}
		}
	}
	public function update($id)
	{
		$data['old_data'] = $this->News_model->select_id($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('content','Content','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->admin_template('admin/news/update',$data);
		} else {
			if ($_FILES['image']['name'] == "")
			{
				$this->News_model->update($id);
				redirect('Admin/News');
			}
			else
			{
				$upload = $this->News_model->upload();
				if($upload['result'] == "success"){ 
					$this->News_model->update($id,$upload['file']['file_name']);
					redirect('Admin/News');
				}else{ 
					$data['error_upload'] = $upload['error'];
					$this->load->admin_template('admin/news/update',$data);
				}
			}
		}
		
	}
	public function delete($id)
	{
		$this->News_model->delete($id);
	}
}

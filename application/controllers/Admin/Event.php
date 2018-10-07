<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
		if ($this->session->userdata('level') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	public function index()
	{
		
		$data['data_list'] = $this->Event_model->select();
		$this->load->admin_template('admin/event/show',$data);
	}
	public function get_data()
	{
		$data['data'] = $this->Event_model->select();
		echo json_encode($data);
	}
	public function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('site_url','Site URL','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->admin_template('admin/event/input');
		} else {
			$upload = $this->Event_model->upload();
			if($upload['result'] == "success"){ 
				$this->Event_model->insert($upload['file']['file_name']);
				redirect('Admin/Event');
			}else{
				$data['message'] = $upload['error'];
				$this->load->admin_template('admin/event/input',$data); 
			}
		}
	}
	public function update($id)
	{
		$data['old_data'] = $this->Event_model->select_id($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('site_url','Site URL','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->admin_template('admin/event/update',$data);
		} else {
			if ($_FILES['image']['name'] == "")
			{
				$this->Event_model->update($id);
				redirect('Admin/Event');
			}
			else
			{
				$upload = $this->Event_model->upload();
				if($upload['result'] == "success"){ 
					$this->Event_model->update($id,$upload['file']['file_name']);
					redirect('Admin/Event');
				}else{ 
					$data['error_upload'] = $upload['error'];
					$this->load->admin_template('admin/event/update',$data);
				}
			}
		}
		
	}
	public function delete($id)
	{
		$this->Event_model->delete($id);
	}
}


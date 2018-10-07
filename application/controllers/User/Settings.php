<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_model');
		if ($this->session->userdata('name') == null) {
			echo '<script>alert("Unable to access")</script>';
			redirect('Login/logout','refresh');
		}
	}
	
	public function index()
	{
		$data['old_data'] = $this->Customer_model->select_id($this->session->userdata('id'));
		if ($this->input->post('name') != $data['old_data']->name) {
			$is_unique_name = '|is_unique[customer.name]';
		}else{
			$is_unique_name = "";
		}
		if ($this->input->post('email') != $data['old_data']->email) {
			$is_unique_email = '|is_unique[customer.email]';
		}else{
			$is_unique_email = "";
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required'.$is_unique_name);
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required'.$is_unique_email);
		$this->form_validation->set_rules('password','Password','required|callback_password_check');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->user_template('user/user_page/settings',$data);
		} else {
			$this->Customer_model->update($this->session->userdata('id'));
			redirect('User/Home','refresh');
		}
	}
	public function password_check($password)
	{
		$where = array(
			'id' => $this->session->userdata('id'),
			'password' => md5($password)
		);
		$check = $this->Customer_model->num_rows($where);
		if ($check == 1) {
			return true;
		}else{
			$this->form_validation->set_message('password_check',"Update failed, you must input true password");
			return false;
		}
	}
	public function change_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old-password','Old Password','required|callback_password_check');
		$this->form_validation->set_rules('password','New Password','required|matches[re-password]');
		$this->form_validation->set_rules('re-password','Re Password','required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/user_page/change_password');
		} else {
			$this->Customer_model->change_password($this->session->userdata('id'));
			echo 'success';
		}
	}
	public function change_avatar()
	{
		$config['upload_path'] = './assets/img/customer/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			$set['image'] = $data['file_name'];
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update('customer',$set);
			$this->session->set_userdata('image',$data['file_name']);
			redirect('User/Settings','refresh');
		}
	}
}

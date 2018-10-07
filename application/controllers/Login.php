<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	
	public function index()
	{
		if ($this->session->userdata('email') == null) {
			redirect('Login/employee','refresh');
		}else{
			if($this->session->userdata('level') != null){
				redirect('Admin/Home','refresh');
			}else if($this->session->userdata('level') == null){
				redirect('User/Home','refresh');
			}
		}
	}
	public function employee()
	{
		$data['title'] = "Siasdsadgn in";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_aut_employee');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header');
			$this->load->view('admin/login',$data);
			$this->load->view('admin/footer');
		}else{
			redirect('Login');
		}
	}
	public function aut_employee($email)
	{
		$password = md5($this->input->post('password'));
		$aut = $this->Login_model->login_employee($email,$password);
		if($aut['num_rows'] == 1){
			$this->session->set_userdata($aut['result']);
			return true;
		}else{
			$this->form_validation->set_message('aut_employee',"Failed Login, wrong email and password");
			return false;
		}
	}
	public function customer()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|trim|callback_aut_customer');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/login');
		}else{
			echo "success";
		}
	}
	public function aut_customer($email)
	{
		$password = md5($this->input->post('password'));
		$aut = $this->Login_model->login_customer($email,$password);
		if($aut['num_rows'] == 1){
			$this->session->set_userdata($aut['result']);
			return true;
		}else{
			$this->form_validation->set_message('aut_customer',"Failed Login, wrong email and password");
			return false;
		}
	}
	public function reg_customer()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[customer.email]');
		$this->form_validation->set_rules('password','Password','required|matches[repassword]');
		$this->form_validation->set_rules('repassword','Password','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('user/register');
		}else{
			$this->Login_model->register_customer();
			echo '<a class="btn btn-primary btn-block collapsed mb-1"  data-toggle="collapse" data-target="#login-collapse" aria-expanded="true" aria-controls="login-collapse">Login</a>';
		}
	}
	public function logout()
 	{
 		$this->session->unset_userdata('email');
 		$this->session->sess_destroy();
 		redirect('','refresh');
 	}
}

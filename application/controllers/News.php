<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
		$this->load->library('pagination');
	}
	
	public function index()
	{
		$page = $this->uri->segment(3);
		$per_page = 10;
		$config['base_url'] = base_url().'News/index/';
		$config['total_rows'] = $this->News_model->num_rows();
		$config['per_page'] = $per_page;

		//config for bootstrap 4 pagination class integration        
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']   = '</span></li>';
		$config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']   = '</span></li>';


		$this->pagination->initialize($config);
		$data['news'] = $this->News_model->select_pagination($per_page,$page);
		$this->load->user_template('user/news',$data);
	}
	public function detail($id)
	{
		$data['news'] = $this->News_model->select_id($id);
		$this->load->user_template('user/news_detail',$data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Videos_model');
	}
	
	public function index()
	{
		$data['videos_star'] = $this->Videos_model->select(array('is_star'=>1));
		$data['videos'] = $this->Videos_model->select(array('is_star'=>0));
		$this->load->user_template('user/videos',$data);
	}
}

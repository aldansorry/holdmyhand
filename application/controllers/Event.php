<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
	}
	
	public function index()
	{
		$data['now_event'] = $this->Event_model->select(array('date'=>date('Y-m-d')));
		$data['upcoming_event'] = $this->Event_model->select(array('date >'=>date('Y-m-d')));
		$data['last_event'] = $this->Event_model->select(array('date <'=>date('Y-m-d')));
		$this->load->user_template('user/event',$data);
	}
}

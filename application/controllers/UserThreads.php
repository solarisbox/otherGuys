<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserThreads extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_threads_model');
		$this->load->helper('url_helper');
    	$this->load->library('template', 'session');	
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$data['threads'] = $this->user_threads_model->get_threads($userid);
		$this->template->show('user_threads', $data);
	}
}

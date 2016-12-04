<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPosts extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_posts_model');
		$this->load->helper('url_helper');
    	$this->load->library('template', 'session');	
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$data['posts'] = $this->user_posts_model->get_posts($userid);
		$this->template->show('user_posts', $data);
	}
}
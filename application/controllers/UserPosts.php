<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPosts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_posts_model');
		$this->load->model('user_panel_model');
		$this->load->helper('url_helper');
    	$this->load->library('template', 'session');	
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$data['results'] = $this->user_panel_model->get_user($userid);
		$data['posts'] = $this->user_posts_model->get_posts($userid);

		$thread_count = $this->user_panel_model->get_thread_count($userid);
		$post_count = $this->user_panel_model->get_message_count($userid);
		$data['total_posts'] = $thread_count + $post_count;

		$this->template->show('user_posts', $data);
	}
}
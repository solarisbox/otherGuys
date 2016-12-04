<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPanel extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
	    $this->load->helper('url_helper');
	    $this->load->library('template');
		$this->load->library('session');
		$this->load->model('user_panel_model');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$userid = $this->session->userdata('userid');

		$data['results'] = $this->user_panel_model->get_user($userid);

		$data['posts'] = $this->user_panel_model->get_posts($userid);

		$this->template->show('user_panel', $data);
	}

}//End of userPanel
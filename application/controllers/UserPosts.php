<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPosts extends MY_Controller {

	var $TPL;

	public function __construct()
	{
	parent::__construct();
	// Your own constructor code
	}

	private function display()
	{
	$this->template->show('user_posts', $this->TPL);
	}

	public function index()
	{

	$this->display();

	$user = $this->session->userdata('user');
	echo $user;

	}

}//End of userPanel
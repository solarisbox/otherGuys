<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	public function index()
	{
		$this->display();
	}

	private function display()
	{
		$this->template->show('login', $this->TPL);
	}

	public function loginuser()
	{
		$this->TPL['msg'] = $this->userauth->login(
				$this->input->post("username"),
				$this->input->post("password")
				);

		$this->display();
	}
	
	public function logout()
	{
		$this->userauth->logout();
	
		redirect(base_url());
	}
}
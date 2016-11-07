<?php

class MY_Controller extends CI_Controller
{
	protected $TPL = array();

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');

		$this->load->helper('tools_helper');
	}
}
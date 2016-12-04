<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	var $TPL;

	public function __construct()
	{
	parent::__construct();
	// Your own constructor code
	}

	private function display()
	{
	$this->template->show('displayControlPanel', $this->TPL);
	}

	public function index()
	{

	$this->display();

	$user = $this->session->userdata('user');
	echo $user;

	}
	
	public function displayPortalConfig()
	{
		$this->TPL['portalConfigs'] = $this->db->query("SELECT * FROM portal_config")->result_array();
		$this->template->show('admin_controlPanel_portalConfig', $this->TPL);
	}

}//End of Admin
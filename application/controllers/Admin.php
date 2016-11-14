<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function displayControlPanel()
	{
		$this->template->show('admin_controlPanel_home');
	}
	
	public function displayPortalConfig()
	{
		$this->TPL['portalConfigs'] = $this->db->query("SELECT * FROM portal_config")->result_array();
		$this->template->show('admin_controlPanel_portalConfig', $this->TPL);
	}
}

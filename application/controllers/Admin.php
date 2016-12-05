<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	var $TPL;

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->model('admin_model');
	}

	public function index()
 	{
 		$this->load->view('welcome_message');
 	}
	
	public function displayControlPanel()
	{
		$data['users'] = $this->admin_model->get_users();
		$this->template->show('admin_controlPanel_home', $data);
	}
	
	public function displayPortalConfig()
	{
		$this->TPL['portalConfigs'] = $this->db->query("SELECT * FROM portal_config")->result_array();
		$this->template->show('admin_controlPanel_portalConfig', $this->TPL);
	}

}//End of Admin
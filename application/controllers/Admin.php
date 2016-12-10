<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	var $TPL;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->helper('tools_helper');
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

	public function success()
	{
		$this->template->show('admin_controlPanel_success', $data);
	}

	public function permissions()
	{	
		$i = 0;
		$j = 0;
    	foreach ($this->input->post('userid') as $row)
    	{
    		$data[$i++]['user'] = (int)$row;
    	}
        
        foreach ($this->input->post('isAdmin') as $row)
        {
        	if($row == 0){
        		$data[$j++]['role'] = 3; //3 for Pleb, Peon
        	}
        	else
        	{	
        		$data[$j++]['role'] = 2;
        	}
    	}
    	//var_dump($data);
    	$this->admin_model->update_permissions($data);
    	redirect(base_url().'index.php?/Admin/success');
	}

	public function delete()
	{
		$i = 0;
		$j = 0;
    	foreach ($this->input->post('userid') as $row)
    	{
    		$data[$i++]['user'] = (int)$row;
    	}
        
        foreach ($this->input->post('delete') as $row)
        {
    		$data[$j++]['delete'] = (int)$row;
    	}  

    	$this->admin_model->delete($data);
    	redirect(base_url().'index.php?/Admin/success');
	}

	public function ban()
	{
		$i = 0;
		$j = 0;
    	foreach ($this->input->post('userid') as $row)
    	{
    		$data[$i++]['user_id'] = (int)$row;
    	}
        
        foreach ($this->input->post('active') as $row)
        {
    		$data[$j++]['active'] = (int)$row;
    	}

		$this->admin_model->ban($data);
		redirect(base_url().'index.php?/Admin/success');
	}

	public function unban()
	{
		$i = 0;
		$j = 0;
    	foreach ($this->input->post('userid') as $row)
    	{
    		$data[$i++]['user_id'] = (int)$row;
    	}
        
        foreach ($this->input->post('active') as $row)
        {
    		$data[$j++]['active'] = (int)$row;
    	}

		$this->admin_model->unban($data);
		redirect(base_url().'index.php?/Admin/success');
	}

	public function block()
	{
		$i = 0;
		$j = 0;
    	foreach ($this->input->post('userid') as $row)
    	{
    		$data[$i++]['user'] = $row;
    	}
        
        foreach ($this->input->post('active') as $row)
        {
        	$delete = convertBooleanToInt($row);
    		$data[$j++]['block'] = $delete;

		}

		$this->admin_model->block();

	}

}//End of Admin
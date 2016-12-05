<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	function get_users()
	{
		$this->db->select('*')
        ->from('users');
    	$query = $this->db->get(); 
		return $query->result_array();
	}
}
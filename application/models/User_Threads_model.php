<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Threads_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	function get_threads($userid)
	{
		$this->db->select('*');
		$this->db->from('threads');
		$this->db->where('user', $userid);	
		$query = $this->db->get();	
       
		return $query->result_array();	
	}
}

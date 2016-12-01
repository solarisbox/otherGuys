<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_Bar_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	function get_results($search_term = null)
	{
		if(!$search_term)
		{
			return false;
		} 
		else if ($search_term)
		{
			$this->db->select('*');
			$this->db->from('threads');
			$this->db->join('users', 'users.user_id = threads.user');
			$this->db->like('title', $search_term);
			$this->db->or_like('body', $search_term);
			$this->db->or_like('users.username', $search_term);
			
			$query = $this->db->get();	
	       
			return $query->result_array();
		}
	}
}

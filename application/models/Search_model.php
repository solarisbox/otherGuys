<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	function get_results($search_term = null, $search_user = null, $search_option, $search_sort)
	{
		if(!$search_term && !$search_user)
		{
			return false;
		} 
		else if ($search_term && !$search_user)
		{
			$this->db->select('*');
			$this->db->from('threads');
			$this->db->like('title', $search_term);
			$this->db->or_like('body', $search_term);
			$this->db->join('users', 'users.user_id = threads.user');
			$this->db->order_by($search_option, $search_sort);
			$query = $this->db->get();	
	       
			return $query->result_array();
		}
		else if (!$search_term && $search_user)
		{
			$this->db->select('*');
			$this->db->from('threads');
			$this->db->join('users', 'users.user_id = threads.user');
			$this->db->like('users.username', $search_user);
			$this->db->order_by($search_option, $search_sort);
			$query = $this->db->get();	
	       
			return $query->result_array();
		} 
		else
		{
			$this->db->select('*');
			$this->db->from('threads');
			$this->db->like('title', $search_term);
			$this->db->or_like('body', $search_term);
			$this->db->join('users', 'users.user_id = threads.user');
			$this->db->where('username', $search_user);
			$this->db->order_by($search_option, $search_sort);
			$query = $this->db->get();	
	       
			return $query->result_array();
		}
	}
}

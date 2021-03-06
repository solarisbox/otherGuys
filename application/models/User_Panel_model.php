<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Panel_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	function get_user($userid)
	{
		$userid = $this->session->userdata('userid');

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id', $userid);	
		$query = $this->db->get();	       
		return $query->result_array();
	}

	function get_posts($userid){

		$this->db->select('*');
		$this->db->from('threads');
		$this->db->where('user', $userid);	
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_thread_count($userid){
		$this->db->where('user', $userid);
		$this->db->from('threads');	
		return $this->db->count_all_results();
	}

	function get_message_count($userid){
		$this->db->where('user', $userid);
		$this->db->from('messages');	
		return $this->db->count_all_results();
	}
}

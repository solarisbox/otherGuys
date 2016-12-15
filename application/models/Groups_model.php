<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	function get_lists($userid)
	{
		$this->db->select('t1.title, t1.group_id, t2.user')
        ->from('groups AS t1, group_members AS t2')
        ->where('t1.group_id = t2.group')
        ->where('t2.user', $userid);
    	$query = $this->db->get(); 
		return $query->result_array();
	}

	function get_members($id = FALSE) 
	{
		$rows = array();
		$this->db->select('*')
        ->from('groups g')
        ->join('group_members gm', 'gm.group=g.group_id', 'left')
        ->join('users u', 'u.user_id=gm.user', 'left')
        ->where('g.group_id', $id);
	    $query = $this->db->get();

	    foreach ($query->result_array() as $row) 
	    {
	    	$rows[] = $row;
	    } 
	    return $rows;
	}

	function create($data){
		$this->db->insert('groups', $data);
	}
}
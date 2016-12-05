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

	function update_permissions($data)
	{
		$this->db->empty_table("user_roles");
		$this->db->insert_batch('user_roles', $data, 'user');
	}

	function delete($data)
	{
		$names = array();

		foreach ($data as $row)
		{
			if($row['delete'] == 1)
			{
				array_push($names, $row['user']);
			}
		} 
		//Delete from User Roles
		$this->db->where_in('user', $names);
		$this->db->delete('user_roles'); 
		//Delete from Users
		$this->db->where_in('user_id', $names);
		$this->db->delete('users'); 
	}

	function ban($data)
	{
		$names = array();

		$array = array(
			'active' => 0,
		);		

		foreach ($data as $row)
		{
			if($row['active'] == 1)
			{
				array_push($names, $row['user_id']);
			}
		}

		if(!empty($names)){
			$this->db->where_in('user_id', $names);
			$this->db->update('users', $array);
		}			
	}

	function block()
	{

	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model{
	
	public function __construct()
	{
		$this->load->database();
	}

	function profile_update($userSettings, $userid) 
    {
        $this->db->where('user_id', $userid);
        $this->db->update('users', $userSettings);              
    }
}




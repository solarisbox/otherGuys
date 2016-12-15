<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IP_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}

	function set_ip($data){
		$this->db->insert('user_ip', $data);
	}
}




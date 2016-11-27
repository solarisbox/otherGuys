<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Threads_model extends CI_Model{

	public function __construct()
    {
        $this->load->database();
    }

    public function get_threads($thread_id = FALSE)
	{
        if ($thread_id === FALSE)
        {
            $query = $this->db->get('threads');
            return $query->result_array();
        }

        $query = $this->db->get_where('threads', array('thread_id' => $thread_id));
        return $query->row_array();
	}
}

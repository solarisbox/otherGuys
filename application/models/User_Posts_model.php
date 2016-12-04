<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Posts_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    function get_posts($userid)
    {
        $this->db->select('*');
        $this->db->from('thread_participants');
        $this->db->join('threads', 'threads.thread_id = thread_participants.thread');
        $this->db->where('thread_participants.user', userid); 
        $query = $this->db->get();  
       
        return $query->result_array();  
    }
}

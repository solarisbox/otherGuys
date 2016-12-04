<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Posts_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    function get_posts($userid)
    {
        $this->db->select('t1.title, t1.thread_id, t2.body')
          ->from('threads AS t1, messages AS t2')
          ->where('t1.thread_id = t2.thread')
          ->where('t2.user', $userid);

        $query = $this->db->get();  
       
        return $query->result_array();  
    }
}

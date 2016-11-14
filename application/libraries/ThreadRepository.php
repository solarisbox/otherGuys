<?php
defined('BASEPATH') OR exit('No direct script access allowed');

public class ThreadRepository
{
    public function showThread($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get('test');
        return $query->result_array();
    }
}
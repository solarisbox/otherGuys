<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
  }

  // private function display()
  // {

  //   $query = $this->db->query("SELECT FROM test WHERE id = '$id';");
    
  //   $this->TPL['threads'] = $query->result_array();

  //   $this->template->show('Thread', $this->TPL);

  // }


  public function display($id){
    $this->db->where('id', $id);
    $query = $this->db->get('test');
    $this->TPL['threads'] = $query->result_array();
    $this->template->show('Thread', $this->TPL);
  }

  public function index()
  {
    
     $this->display();

  }
}


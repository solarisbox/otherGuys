<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
  }

  private function display()
  {
    $query = $this->db->query("SELECT * FROM threads ORDER BY thread_id ASC;");
    
    $this->TPL['threads'] = $query->result_array();

    $this->template->show('Forum', $this->TPL);
  }

  public function index()
  {
     $this->display();
  }
}


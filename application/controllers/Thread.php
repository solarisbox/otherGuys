<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {

  var $TPL;
  
  public function __construct()
  {
    parent::__construct();
    $this->load->library('ThreadRepository');
  }

  public function display($id)
  {
    $this->TPL['threads'] = $this->ThreadRepository->showThread($id);
    $this->template->show('Thread', $this->TPL);
  }

  public function index()
  {  
     $this->display();
  }
  
}


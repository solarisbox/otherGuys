<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
  }

  private function display()
  {

    $this->template->show('start', $this->TPL);

  }

  public function index()
  {
    
     $this->display();

  }
}


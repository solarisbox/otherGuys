<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
  }

  private function display()
  {
    // $query = $this->db->query("SELECT * FROM ephemeral WHERE featured = true ORDER BY id ASC;");

    // $queryAmmo = $this->db->query("SELECT * FROM Ammo;");

    // $queryAccessories = $this->db->query("SELECT * FROM Accessories;");
    
    // $this->TPL['listing'] = $query->result_array();

    // $this->TPL['listingAmmo'] = $queryAmmo->result_array();

    // $this->TPL['listingAccessories'] = $queryAccessories->result_array();

    $this->template->show('search', $this->TPL);

  }

  public function index()
  {
    //$this->template->show('home', $this->TPL);

    //$this->load->database();

    //$query = $this->db->query("SELECT * FROM rifles;");
    
    //$this->TPL['listing'] = $query->result_array();

    //print_r($this->TPL);
    
     $this->display();

  }
}


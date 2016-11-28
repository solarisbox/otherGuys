<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->model('search_model');
    $this->load->model('search_bar_model');
    $this->load->helper('url_helper');
    $this->load->library('template');
  }

  public function index()
  {    
    $this->template->show('search/search');
  }

  public function execute_search()
  {
      $search_term = $this->input->post('keywords');
      $search_user = $this->input->post('username');
      $search_option = $this->input->post('option');
      $search_sort = $this->input->post('sort');
      
      $data['results'] = $this->search_model->get_results($search_term, $search_user,
        $search_option, $search_sort);
      
      $this->template->show('search/search_results', $data);
  }

  public function navbar_search()
  {
      $search_term = $this->input->post('searchBar');
      $data['results'] = $this->search_bar_model->get_results($search_term);
      $this->template->show('search/search_results', $data);
  }
}


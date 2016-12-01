<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // Your own constructor code
    $this->load->model('threads_model');
    $this->load->helper('url_helper');
    $this->load->library('template');
  }

  public function index()
  {
    $data['threads'] = $this->threads_model->get_threads(); 
    $this->template->show('forum/index', $data); 
  }

   public function view($thread_id = NULL)
  {
    $data['thread_item'] = $this->threads_model->get_threads($thread_id);

    if (empty($data['thread_item']))
    {
      show_404();
    }

    $this->template->show('forum/view', $data);
  }
}


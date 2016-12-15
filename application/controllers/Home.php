<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();
class Home extends CI_Controller {

  var $TPL;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ip_model');
  }

  private function display()
  {
    $this->template->show('home', $this->TPL);
  }

  public function index()
  {
   // 	if($this->session->userdata('logged_in'))
   // {
   //   $session_data = $this->session->userdata('logged_in');
   //   $data['username'] = $session_data['username'];
   //   $this->load->view('home', $data);
   //   //$this->display();
   // }
   // else
   // {
   //   //If no session, redirect to login page
   //   redirect('login', 'refresh');
   // }
    
    $this->display();

    $user = $this->session->userdata('user');
    $data['user_id'] = $this->session->userdata('userid');

    if(isset($data['user_id'])){
      $data['ip_address'] = $this->input->ip_address();
      $this->ip_model->set_ip($data);
    }
    
    echo $user;

  }//End of index()

 //  function logout()
 // {
 //   $this->session->unset_userdata('logged_in');
 //   session_destroy();
 //   redirect('home', 'refresh');
 // }//End of logout(); 

}//End of Home


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileSettings extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('tools_helper');
    $this->load->helper('url_helper');
    $this->load->model('settings_model');
    $this->load->model('user_panel_model');
    $this->load->library('template', 'session');
  }

  public function index()
  {    
		$username = $this->session->userdata('username');
    $userid = $this->session->userdata('userid');
		$data['username'] = $username;
    $data['results'] = $this->user_panel_model->get_user($userid);

    $thread_count = $this->user_panel_model->get_thread_count($userid);
    $post_count = $this->user_panel_model->get_message_count($userid);
    $data['total_posts'] = $thread_count + $post_count;
    
    $this->template->show('profile_settings', $data);
  }

	public function profile_update()
	{
		$userid = $this->session->userdata('userid');

		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    $this->form_validation->set_rules('firstName', 'First Name', 'trim|max_length[25]');
    $this->form_validation->set_rules('lastName', 'Last Name', 'trim|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'trim|max_length[25]|alpha_numeric',
                    array('required' => 'You must provide a %s.')
            );
    $this->form_validation->set_rules('passwordConfirm', 'Password Confirmation', 'matches[password]');
    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|max_length[50]');
    			$private = convertBooleanToInt($this->input->post('private'));

    $config['upload_path'] = './avatars/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = 20;
    $config['max_width']     = 64;
    $config['max_height']    = 64;
    $this->load->library('upload', $config);
    $this->upload->do_upload('avatar');
    $avatar = $this->upload->data();
    $avatar_name = $avatar['file_name'];

    if ($this->form_validation->run() == FALSE)
    {
      $this->template->show('profile_settings', $data);
    }
    else
    {
    	if($this->input->post('firstName') != "")
			{
				$data['firstName'] = $this->input->post('firstName');
			}

			if($this->input->post('lastName') != "")
			{
				$data['lastName'] = $this->input->post('lastName');
			}

			if($this->input->post('password') != "")
			{
			  $data['password'] = $this->input->post('password');
			  $data['password'] =  openssl_encrypt($data['password'], "aes128", ENCRYPT_PASS, 0, ENCRYPT_IV);
			}

			if($this->input->post('email') != "")
			{
			  $data['email'] = $this->input->post('email');
			}

			if($this->input->post('signature') != "")
			{
			  $data['signature'] = $this->input->post('signature');
			}

			$data['private'] = $private;
      
      $this->settings_model->profile_update($data, $userid);
      $this->template->show('settings_success', $data);
    }	
	}
}


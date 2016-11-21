<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('tools_helper');
	}

	public function index()
	{
		$this->display();
	}

	private function display()
	{
		$this->template->show('register', $this->TPL);
	}
	
	private function validate()
	{
		$this->load->helper(array('form', 'url'));
	
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[25]|alpha_numeric|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[25]|alpha_numeric');
		$this->form_validation->set_rules('passwordConfirm', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|valid_email|max_length[50]');
		$this->form_validation->set_error_delimiters('<div class = "alert alert-danger">','</div>');
			
		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function register()
	{
		if($this->validate())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$passwordConfirm = $this->input->post('passwordConfirm');
			$email = $this->input->post('email');
			$private = convertBooleanToInt($this->input->post('private'));
				
			$password =  openssl_encrypt($password, "aes128", ENCRYPT_PASS, 0, ENCRYPT_IV);
				
			$newUser = array('password' => $password,
					'username' => $username,
					'email' => $email,
					'private' => $private,
					'active' => getDefaultUserState()
			);
				
			$this->db->set($newUser);
			$this->db->insert("users");
			
			redirect(base_url() . 'index.php/Login');
		}
		else
		{
			$this->display();
		}
	}
	
	public function username_check($username)
	{
		$query = $this->db->query("SELECT user_id FROM users WHERE username = '$username'");
	
		if($query->num_rows() > 0)
		{
			$this->form_validation->set_message ( 'username_check' ,
					'Username is already in use' ) ;
				
			return false;
		}
		else
		{
			return true;
		}
	}
}

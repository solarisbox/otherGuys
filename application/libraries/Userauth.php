<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userauth  {
	 
	private $login_page = "";
	private $logout_page = "";
	 
	private $username;
	private $password;
	private $userid;

	function __construct()
	{
		error_reporting(E_ALL & ~E_NOTICE);
		$this->login_page = base_url() . "index.php?/Home";
		$this->logout_page = base_url() . "index.php?/Home";
	}

	public function login($username,$password)
	{
		session_start();

		if ($this->validSessionExists() == true)
		{
			$this->redirect(base_url());
		}

		if ($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			return;
		}

		if ($this->formHasValidCharacters($username, $password) == false)
		{
			return "Username/password fields cannot be blank!";
		}

		if ($this->userIsInDatabase() == false)
		{
			return '<div class = "alert alert-danger">Invalid username/password!</div>';
		}
		else
		{
			$this->writeSession();
			$this->redirect(base_url());
		}
	}

	public function loggedin()
	{

		session_start();
		 
		if ($this->validSessionExists() == false)
		{
			$this->redirect($this->login_page);
		}

		return true;
	}

	public function logout()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
		header("Location: ".$this->logout_page);
	}

	public function validSessionExists()
	{
		session_start();
		if (!isset($_SESSION['username']))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function formHasValidCharacters($username, $password)
	{
		if ( (empty($username) == false) && (empty($password) == false) )
		{
			$this->username = $username;

			$this->password = openssl_encrypt($password, "aes128", ENCRYPT_PASS, 0,  ENCRYPT_IV);

			return true;
		}
		else
		{
			return false;
		}
	}

	public function userIsInDatabase()
	{
		$CI =& get_instance();

		$query = $CI->db->query("SELECT * FROM users WHERE username = '$this->username' AND password = '$this->password';");

		if($query->num_rows() > 0)
		{
			$query = $CI->db->query("SELECT user_id FROM users WHERE username = '$this->username' AND password = '$this->password';");
				
			foreach($query->result_array() as $row)
			{
				$this->userid = $row['user_id'];
			}
				
			return true;
		}
		return false;
	}

	public function redirect($page)
	{
		header("Location: ".$page);
		exit();
	}

	public function writeSession()
	{
		$_SESSION['userid'] = $this->userid;
		$_SESSION['username'] = $this->username;
	}

	public function getUsername()
	{
		return $_SESSION['username'];
	}
}


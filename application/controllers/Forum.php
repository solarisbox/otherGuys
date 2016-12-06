<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends MY_Controller 
{
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
	    $threads = getThreads(); 
	    
	    $data['threads'] = $threads;
	    
	    $this->template->show('forum/forum_home', $data); 
	  }
	  
	  public function lookupUsers()
	  {
	  	$term = $this->input->post("term");
	  	
	  	echo lookupUsers($term);
	  }
	  
	  public function addParticipant()
	  {
	  	$thread_participant['thread'] = $this->input->post("thread");
	  	$thread_participant['user'] = $this->input->post("user");
	  	
	  	$this->db->insert("thread_participants", $thread_participant);
	  }
	  
	  public function ajaxLoadThreadParticipantsTable()
	  {
	  	$userid = $_SESSION['userid']; 
	  	$thread = $this->input->post("thread");
	  	$TPL['participants'] = getThreadParticipants($thread);
	  	$TPL['includeActions'] = isAdmin($userid) || isThreadAuthor($userid, $thread);
	  	$TPL['thread_item']['thread_id'] = $thread;
	  	
	  	
	  	echo $data;
	  }
	  
	  public function ajaxLoadThreadParticipants()
	  {
	  	$userid = $_SESSION['userid'];
	  	$thread = $this->input->post("thread");
	  	$TPL['participants'] = ajaxLoadThreadParticipants($thread);
	  	$TPL['includeActions'] = isAdmin($userid) || isThreadAuthor($userid, $thread);
	  	$TPL['thread_item']['thread_id'] = $thread;
	  
	  	$data = $this->load->view('forum/forum_threadParticipantsAjax', $TPL, true);
	  
	  	echo $data;
	  }
	  
	  public function removeParticipant()
	  {
	  	$participant = $this->input->post("participant");
	  
	  	$this->db->where("participant_id", $participant);
	  	$this->db->delete("thread_participants");
	  }
	
	   public function view($thread_id = NULL)
	  {
	    $data['thread_item'] = $this->threads_model->get_threads($thread_id);
	
	    if (empty($data['thread_item']))
	    {
	      show_404();
	    }

	   $messages = getThreadMessages($thread_id);
	    
	   for($i = 0; $i < sizeof($messages); $i++)
	   {
	   	$messages[$i]['avatar'] = getUserAvatar($messages[$i]['user']);
	   	$messages[$i]['author'] = $messages[$i]['user'] == null ? 'Anonymous' : getUsername($messages[$i]['user']);
	   }
	   
	   $data['messages'] = $messages;
	
	    $this->template->show('forum/view', $data);
	  }
	  
	  public function displayCreateThread()
	  {
	  	$this->TPL['topics'] = getForumTopics();
	  	
	  	$this->template->show('forum/forum_createThread', $this->TPL);
	  }
	  
	  public function postMessage()
	  {
	  	if($this->validateMessage())
	  	{
	  		$body = sanitize($this->input->post("body", true));
	  		$thread = $this->input->post("thread");
	  		$user =  $_SESSION['userid'] == null ? "null" : $_SESSION['userid'];
	  		
	  		$this->db->query("INSERT INTO messages(user, thread, body) VALUES($user, $thread, '$body')");
	  	}
	  	
	  	$this->view($thread);
	  }
	  
	  public function createThread()
	  {
	  	 if($this->validateThread())
	  	 {
	  	 	$title = $this->input->post("title");
		  	$body = sanitize($this->input->post("body", true));		  	
	  	 	$private = $this->input->post("private");
		  	$private = $private == null ? 0 : convertBooleanToInt($private);
		  	$topic = $this->input->post("topic");
		  	$time_number = $this->input->post("time_number");
		  	$time_unit = $this->input->post("time_unit");
		  	
		  	$unit = null;
		  	
		  	switch($time_unit)
		  	{
		  		case "minutes":
		  			$unit = "MINUTE";
		  			break;
		  		case "hours":
		  			$unit = "HOUR";
		  			break;
		  		case "days":
		  			$unit = "DAY";
		  			break;
		  		case "weeks":
		  			$unit = "WEEK";
		  			break;
		  		case "months":
		  			$unit = "MONTH";
		  			break;
		  		case "years":
		  			$unit = "YEAR";
		  			break;
		  	}
		  	
		  	$date = null;
		  	
		  	if($unit != null && $time_number != null)
		  	{
		  		$date = ", DATE_ADD(CURDATE(), INTERVAL $time_number $unit)";
		  	}
		  			  	
		  	$this->db->query("INSERT INTO threads(title, body, private, topic, user
		  			" . ($date == null ? "" : ", expiry_date") . "
		  			) VALUES('$title', '$body', $private, '$topic', 
		  			"  . (isset($_SESSION[userid]) ? $_SESSION[userid] : "null") .  "
		  			" . ($date == null ? "" : $date) . "
		  			)");
		  	
		  	$this->index();
	  	 }
	  	 else 
	  	 {	  	 		  	 
	  	 	$this->displayCreateThread();
	  	 }
	  }
  
	private function validateThread()
	{
		$this->load->helper(array('form', 'url'));
	
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('body', 'Post', 'trim|required');
		$this->form_validation->set_rules('time_number', 'Time Number', 'trim|numeric');
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
	
	private function validateMessage()
	{
		$this->load->helper(array('form', 'url'));
	
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		$this->form_validation->set_rules('thread', 'Thread', 'trim|required|numeric');
			
		if ($this->form_validation->run() == FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}


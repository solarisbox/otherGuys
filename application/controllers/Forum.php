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
	    $data['threads'] = $this->threads_model->get_threads(); 
	    $this->template->show('forum/forum_home', $data); 
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
	  
	  public function displayCreateThread()
	  {
	  	$this->TPL['topics'] = getForumTopics();
	  	
	  	$this->template->show('forum/forum_createThread', $this->TPL);
	  }
	  
	  public function createThread()
	  {
	  	 if($this->validate())
	  	 {
	  	 	$title = $this->input->post("title");
		  	$body = $this->input->post("body");		  	
		  	$private = convertBooleanToInt($this->input->post("private"));
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
		  	
		  	if($unit != null)
		  	{
		  		$date = "DATE_ADD(CURDATE(), INTERVAL $time_number $unit)";		  		
		  	}
		  			  	
		  	$thread = array(
		  			"title" => $title,
		  			"body" => $body,
		  			"private" => $private,
		  			"topic" => $topic,
		  			"expiry_date" => $date,
		  	);
		  	
		  	$this->db->insert("threads", $thread);
		  	
		  	$this->index();
	  	 }
	  	 else 
	  	 {	  	 		  	 
	  	 	$this->displayCreateThread();
	  	 }
	  }
  
	private function validate()
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
}


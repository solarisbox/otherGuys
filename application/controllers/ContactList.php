<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactList extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('groups_model');
		$this->load->library('session');
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$data['list'] = $this->groups_model->get_lists($userid);
		$this->template->show('contacts/index', $data);
	}

	public function view($id = NULL)
	{
		$data['list_item'] = $this->groups_model->get_members($id);

		if (empty($data['list_item']))
    {
      show_404();
    }

    $this->template->show('contacts/view', $data);
	}

	public function create()
	{
		$userid = $this->session->userdata('userid');
		$title = $this->input->post('title');
		
		$newList = array(
				'title' => $title,
			);
				
		$this->db->set($newList);
		$this->db->insert("groups");

		$insertID = $this->db->insert_id();

		$groupMembers = array(
				'group' => $insertID,
				'user' => $userid,
			);

		$this->db->set($groupMembers);
		$this->db->insert("group_members");
		redirect(base_url().'index.php?/ContactList');
	}

	public function add_user()
	{
		$username = $this->input->post('username');
		$group_id = $this->input->post('group_id');

		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->like('username', $username);
		$query = $this->db->get();

		$user = array();

		foreach ($query->result_array() as $item) {
		    $user[] = $item['user_id'];
		}

		if($user[0] != NULL){
			$newMember = array(
				'group' => $group_id,
				'user' => $user[0],
			);

			$this->db->set($newMember);
			$this->db->insert("group_members");
			redirect(base_url().'index.php?/ContactList/view/'.$group_id);
		}
		else
		{
			redirect(base_url().'index.php?/ContactList/view/'.$group_id);
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function isAdmin($id)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT user_role_id FROM user_roles WHERE user = $id && (role = " . ADMIN_ROLE . " || role = " . ROOT_ROLE . ")");
	
	return $result->num_rows() > 0;
}

function isRoot($id)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT user_role_id FROM user_roles WHERE user = $id && role = " . ROOT_ROLE);
	
	return $result->num_rows() > 0;
}

function getThreadParticipants($thread)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT * FROM thread_participants p LEFT JOIN users u ON p.user = u.user_id WHERE p.thread = $thread");
	
	return $result->result_array();
}

function ajaxLoadThreadParticipants($thread)
{
	$CI = &get_instance();
	
	$sortDirection = $CI->input->post("sortDirection");
	$field = $CI->input->post("field");
	
	$CI->db->select("*")->from("thread_participants p");
	
	$CI->db->join('users u', 'u.user_id = p.user');
	
	$CI->db->where("p.thread", $thread);
	
	if($sortDirection != null && $field != null)
	{
		$CI->db->order_by($field, $sortDirection);
	}
	
	$result = $CI->db->get();

	return $result->result_array();
}

function lookupUsers($term)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT * FROM users WHERE username LIKE '%$term%'");
	
	$count = 0;
	
	$users = array();
	
	foreach($result->result_array() as $user)
	{		
		$users[$count]['label'] = $user['username'];
		$users[$count]['value'] = $user['user_id'];
		$count++;
	}
	
	return json_encode($users);
}

function isThreadAuthor($user, $thread)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT * FROM threads WHERE user = $user && thread_id = $thread");
	
	return $result->num_rows() > 0;
}

function getThreadMessages($thread)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT * FROM messages WHERE thread = $thread");
	
	return $result->result_array();
}

function getUsername($user)
{
	$CI = &get_instance();
	
	$user = $CI->db->query("SELECT * FROM users WHERE user_id = $user")->row();
	
	return $user->username;
}

function getLastMessage($thread)
{
	$CI = &get_instance();
	
	$message = $CI->db->query("SELECT * FROM messages WHERE thread = $thread ORDER BY message_id DESC")->row();
	
	return $message->post_date;
}

function sanitize($str)
{
	return addslashes (htmlspecialchars($str));
}

function getMessageCount($thread)
{
	$CI = &get_instance();

	return $CI->db->query("SELECT * FROM messages WHERE thread = $thread")->num_rows();
}

function getForumTopics()
{
	$CI = &get_instance();
	
	return $CI->db->query("SELECT * FROM topics")->result_array();
}

function isThreadExpiring($id)
{
	$CI = &get_instance();
	
	$threshold = getThreadExpireWarningThreshold();
	
	$result = $CI->db->query("SELECT thread_id FROM threads WHERE thread_id = $id && TIMESTAMPDIFF(minute, expiry_date, NOW()) < $threshold");
	
	return $result->num_rows() > 0;
}

function getThreads()
{
	$CI = &get_instance();
	$user = $_SESSION['userid'];
	$threads = null;
	
	if($user != null)
	{
		$query = "SELECT * FROM threads t WHERE (t.private = 0) || (t.private = 1 && ($user = t.user  || ($user IN (SELECT p.user FROM thread_participants p WHERE p.thread = t.thread_id))))";
		
	}
	else 
	{
		$query = "SELECT * FROM threads t WHERE t.private = 0";
	}
	
	$result = $CI->db->query($query);
	
	$threads = $result->result_array();
	
	for($i = 0; $i < sizeof($threads); $i++)
	{
		$thread_id = $threads[$i]['thread_id'];
		$threads[$i]['is_thread_expiring'] = isThreadExpiring($thread_id);
		$threads[$i]['message_count'] = getMessageCount($thread_id);
	}
	
	return $threads;
}

function getDefaultUserState()
{
	return (int) getPortalConfigValue('DEFAULT_USER_STATE');
}

function getThreadExpireWarningThreshold()
{
	return (int) getPortalConfigValue('THREAD_EXPIRE_WARNING_THRESHOLD');
}

function convertBooleanToInt($bool)
{
	return $bool ? 1 : 0;
}

function getUserAvatar($user)
{
	$avatar = null;
	
	if($user != null)
	{
		$CI = &get_instance();
		
		$result = $CI->db->query("SELECT avatar_url FROM users WHERE user_id = $user");
		
		$user = $result->row();
		
		$avatar = $user->avatar_url;		
	}
	else 
	{
		$avatar = getDefaultAvatar();
	}
	
	return $avatar;
}

function getDefaultAvatar()
{
	return base_url() . "/avatars/no-avatar.png";
}

function getThreadLimit()
{
	return (int) getPortalConfigValue('THREAD_LIMIT');
}

function getPortalConfigValue($key)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT config_value FROM portal_config WHERE config_key = '$key'");
	
	$row = $result->row();
	
	return $row->config_value;
}
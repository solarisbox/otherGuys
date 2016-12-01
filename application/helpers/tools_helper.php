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

function getThreadMessages($thread)
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT * FROM messages WHERE thread = $thread");
	
	return $result->result_array();
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
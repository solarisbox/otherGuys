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

function isThreadExpiring($id)
{
	$CI = &get_instance();
	
	$threshold = getThreadExpireWarningThreshold();
	
	$result = $CI->db->query("SELECT thread_id FROM threads WHERE thread_id = $id && TIMESTAMPDIFF(minute, expiry_date, NOW()) < $threshold");
	
	return $result->num_rows() > 0;
}

function getThreadExpireWarningThreshold()
{
	$CI = &get_instance();
	
	$result = $CI->db->query("SELECT config_value FROM portal_config WHERE config_key = 'THREAD_EXPIRE_WARNING_THRESHOLD'");
	
	$row = $result->row();
	
	return (int) $row->config_value;
}

function convertBooleanToInt($bool)
{
	return $bool ? 1 : 0;
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>
<body>
<div id="wrap">
	<div id="container">
		<h1>Advanced Search</h1>
		<div id="body">
			<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

			
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
</div>
<?
 	if($this->uri->segment(1)=='Search'){
	 	echo "<script>$('#searchNav').addClass('active');</script>";
	 }

?>

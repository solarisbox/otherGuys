<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Ephemeral Board</title>
</head>
<body>

<div id="wrap">
	<h1>About Ephemeral</h1>
	<div id="body">
		<div class="row">
			<div class="col-xs-12">
				About Ephemeral
			</div>
			<div class=col-xs-12>
				Insert description here!
			</div>
		</div>
	</div>
</div>
<?
 	if($this->uri->segment(1)=='About'){
	 	echo "<script>$('#aboutNav').addClass('active');</script>";
	 }
?>

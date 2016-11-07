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
	<div id="body">
<<<<<<< HEAD
		<h1 class="text-center">About Ephemeral</h1>

		</br>

		<h3 class="text-center">Mission Statement:</h3>

		</br>

		<h4 class="text-center">Provide a service that will allow you to post any information, or ask questions anonymously.</h4>

=======
		<div class="row">
			<div class="col-xs-12">
				About Ephemeral
			</div>
			<div class=col-xs-12>
				Insert description here!
			</div>
		</div>
>>>>>>> origin/master
	</div>
</div>
<?
 	if($this->uri->segment(1)=='About'){
	 	echo "<script>$('#aboutNav').addClass('active');</script>";
	 }
?>

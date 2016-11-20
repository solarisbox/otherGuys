<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Ephemeral Board</title>
</head>
<body class="home">
	<div class="container">
		<div class="jumbotron force-transparent">
			<h3>About Ephemeral</h3>
			<br />
			<h4>Mission Statement</h4>
			<h5>Provide a service that will allow you to post any information, or ask questions anonymously.</h5>
		</div>
	</div>



<?php
 	if($this->uri->segment(1)=='About'){
	 	echo "<script>$('#aboutNav').addClass('active');</script>";
	 }
?>

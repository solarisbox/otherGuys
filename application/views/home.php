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
			<h1 class="text-center">Ephemeral</h1>
		</div>
		<div class="jumbotron force-transparent">
			<h4>Please login to start using this application or click on forums to view recent posts.</h4>
		</div>
	</div>
<?php
 	if($this->uri->segment(1)=='Home'){
	 	echo "<script>$('#homeNav').addClass('active');</script>";
	 	//echo $this->uri->segment(1)=='Home';
	 }
?>

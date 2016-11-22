<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ephemeral Board</title>
</head>
<body class="home">
	<div class="container">
		<div class="jumbotron force-transparent">
			<h1 class="text-center">Ephemeral</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default force-transparent bordered">
					<div class="panel-body">
						<h2>User Name Here</h2>
						<div class="col-md-2 col-lg-2" id="leftCol">
							<ul class="nav nav-stacked user-profile" id="sidebar">
							<li><a href="<?= base_url(); ?>index.php?/UserPanel">Control Panel</a></li>
							<li><a href="<?= base_url(); ?>index.php?/profileSettings">Profile Settings</a></li>
							<li><a href="<?= base_url(); ?>index.php?/contactList">Contact List</a></li>
							<li><a href="<?= base_url(); ?>index.php?/userPosts">All Posts</a></li>
							<li><a href="<?= base_url(); ?>index.php?/userThreads">Threads</a></li>
							</ul>
						</div><!--left-->
						<div class="col-md-10 col-lg-10">
							<h2>Your Threads</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

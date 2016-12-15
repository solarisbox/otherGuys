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
				<div class="panel panel-eph">
					<div class="panel-body">
						<h2><?= $username ?></h2>
						<div class="row">
							<div class="col-xs-2" id="leftCol">
								<ul class="nav nav-stacked user-profile" id="sidebar">
									<li><a href="<?= base_url(); ?>index.php?/UserPanel">Control Panel</a></li>
									<li><a href="<?= base_url(); ?>index.php?/ProfileSettings">Profile Settings</a></li>
									<li><a href="<?= base_url(); ?>index.php?/ContactList">Contact List</a></li>
									<li><a href="<?= base_url(); ?>index.php?/UserPosts">All Posts</a></li>
									<li><a href="<?= base_url(); ?>index.php?/UserThreads">Threads</a></li>
								</ul>
							</div><!--left-->
							<div class="col-xs-2">
								<h4>Your settings have been saved.</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
							<li><a href="<?= base_url(); ?>index.php?/ProfileSettings">Profile Settings</a></li>
							<li><a href="<?= base_url(); ?>index.php?/ContactList">Contact List</a></li>
							<li><a href="<?= base_url(); ?>index.php?/UserPosts">All Posts</a></li>
							<li><a href="<?= base_url(); ?>index.php?/UserThreads">Threads</a></li>
							</ul>
						</div><!--left-->
						<div class="col-md-10 col-lg-10">
							<h2>Name Contact List</h2>
							<!--This page will use Ajax for live search-->
							<form method = "POST" id = "newList centered" action = "<?php echo base_url() . 'index.php?/' ?>">
								<div class= "row col-lg-12 col-md-12 col-sm-6">
									<div class = "form-group">
										<label for = "listName">Name of List:</label>
										<input type = "text" id = "listName" name = "listName" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "listName">Search Members:</label>
										<input type = "text" id = "listName" name = "listName" class = "form-control default-search" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
						<h2>User Name Here</h2>
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
							<div class="col-xs-10">
								<h2>Name of Lists</h2>
								<!--This page will use Ajax for live search-->
								<form method = "POST" id = "searchList centered" action = "<?php echo base_url() . 'index.php?/' ?>">
									<div class= "row col-lg-12 col-md-12 col-sm-6">
										<div class = "form-group">
											<label for = "members">Search Members:</label>
											<input type = "text" id = "members" name = "members" class = "form-control default-search" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

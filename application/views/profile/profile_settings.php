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
						<h2>User Name</h2>
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
							<h2>User Settings</h2>

							<form method = "POST" id = "profileForm centered" action = "<?php echo base_url() . 'index.php?/' ?>">
								<div class= "row col-lg-12 col-md-12 col-sm-6">
									<div class = "form-group ">
										<label for = "password">Change Password:</label>
										<input type = "text" id = "password" name = "password" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "confirmPass">Confirm Password:</label>
										<input type = "text" id = "confirmPass" name = "confirmPass" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "email">Email:</label>
										<input type = "text" id = "email" name = "email" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "signature">Signature:</label>
										<input type = "text" id = "signature" name = "signature" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "avatar">Avatar:</label>
										<input type = "text" id = "avatar" name = "avatar" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label class="checkbox-inline"><input type="checkbox" value="">Do Not Show Me in User List</label>
									</div>

									<div class = "form-group row col-md-6 search-buttons">
										<input type = "submit" id = "settings" name = "settings" class = "btn btn-primary" value = "Save"  />
									    <button type="reset" class="btn btn-primary">Reset</button>
									</div>	
								</div>
							</form><!--End of Form-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

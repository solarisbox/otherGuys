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
		<?php
		foreach ($results as $row) {
			$date = substr($row['join_date'], 0, 10);
		} ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-eph">
					<div class="panel-heading">
						<h3><?= $username ?></h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-2" id="leftCol">
								<img src="http://placehold.it/64x64" alt="Image" style="display: block;padding: 10px 15px;">
								<ul class="nav nav-stacked user-profile">
									<li style="position: relative;display: block;padding: 10px 15px;">
										Date Joined:<br/>
										<?= $date ?><br/>
										Posts: <?= $total_posts ?><br/>
									</li>
								</ul>
								<ul class="nav nav-stacked user-profile" id="sidebar">
									<li><a href="<?= base_url(); ?>index.php?/UserPanel">Control Panel</a></li>
									<li><a href="<?= base_url(); ?>index.php?/ProfileSettings">Profile Settings</a></li>
									<li><a href="<?= base_url(); ?>index.php?/ContactList">Contact List</a></li>
									<li><a href="<?= base_url(); ?>index.php?/UserPosts">All Posts</a></li>
									<li><a href="<?= base_url(); ?>index.php?/UserThreads">Threads</a></li>
								</ul>
							</div><!--left-->
							<div class="col-xs-10">
								<h2>User Settings</h2>

								<?php echo form_open_multipart('ProfileSettings/profile_update');?>

								<div class="col-xs-12">
									<?php echo validation_errors()?>
								</div>
								<div class= "row col-lg-12 col-md-12 col-sm-6">
									<div class = "form-group ">
										<label for = "firstName">First Name:</label>
										<input type = "text" id = "firstName" name = "firstName" class = "form-control default-search" />
									</div><div class = "form-group ">
										<label for = "lastName">Last Name:</label>
										<input type = "text" id = "lastName" name = "lastName" class = "form-control default-search" />
									</div>
									<div class = "form-group ">
										<label for = "password">Change Password:</label>
										<input type = "text" id = "password" name = "password" class = "form-control default-search" />
									</div>

									<div class = "form-group">
										<label for = "passwordConfirm">Confirm Password:</label>
										<input type = "text" id = "passwordConfirm" name = "passwordConfirm" class = "form-control default-search" />
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
										<label class="checkbox-inline"><input type="checkbox" id="private" name="private">Set Account to Private</label>
									</div>

									<div class = "form-group">
										<label for = "avatar">Avatar:</label>
										<input type = "file" id = "avatar" name = "avatar" class = ""/>
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
	</div>

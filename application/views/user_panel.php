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
		<?
		foreach ($results as $row) {
				$username = $row['username'];
				$userid = $row['user_id'];
				$email = $row['email'];
				$date = substr($row['join_date'], 0, 10);
		} ?>
		<div class="jumbotron force-transparent">
			<h1 class="text-center">Ephemeral</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default force-transparent bordered">
					<div class="panel-body">
						<h2><?= $username ?></h2>
						<div class="col-md-2 col-lg-2" id="leftCol">
							<img src="http://placehold.it/64x64">
							<ul class="nav nav-stacked user-profile">
								<li>Date Joined:</li>
								<li><?= $date ?></li>
								<li>Posts: <?= $total_posts ?></li>
							</ul>
							<ul class="nav nav-stacked user-profile" id="sidebar">
								<li><a href="<?= base_url(); ?>index.php?/UserPanel">Control Panel</a></li>
								<li><a href="<?= base_url(); ?>index.php?/ProfileSettings">Profile Settings</a></li>
								<li><a href="<?= base_url(); ?>index.php?/ContactList">Contact List</a></li>
								<li><a href="<?= base_url(); ?>index.php?/UserPosts">All Posts</a></li>
								<li><a href="<?= base_url(); ?>index.php?/UserThreads">Threads</a></li>
							</ul>
						</div><!--left-->
						<div class="col-md-10 col-lg-10">
							<h2>Recent Activity</h2>
							<div>
							<? foreach ($posts as $row) { ?>
								<h3>
									<a style="" href = "<?php echo site_url('forum/'.$row['thread_id']); ?>" > 
										<?= $row['title'] ?> 
									</a>
								</h3>
								<p class="body-excerpt"> <?= $row['body'] ?> </p>
							<?}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
						<h2><?= $userid ?></h2>
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
							<? $title = current($list_item)?>
							<h2> <?= $title['title'] ?> </h2>
							<h3>Add New Member: <span onclick="show();" class="glyphicon glyphicon-plus"></span></h3>
							<div id="member-form" class="member-form" style="display:none">
								<form method = "POST" id = "newMember" action= "<?php echo base_url() . 'index.php?/ContactList/add_user' ?>" >
									<input id="username" name="username" type="text" />
									<input style="display:none;" id="group_id" name="group_id" value="<?= $title['group_id'] ?>"/>
									<input type = "submit" id = "add" name = "add" class = "btn btn-primary" value = "Add Member"  />
								</form>	
							</div> 
							<br>
							<h4>Members: </h4>
								<? foreach($list_item as $row){ ?>
									<h4> <?= $row['username'] ?> 	
							<?	}?>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function show(){
			$("#member-form").show();
		}	
	</script>

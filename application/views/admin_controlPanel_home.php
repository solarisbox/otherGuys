<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
</head>
<body class="home">
	<div class="container">
		<div class="jumbotron force-transparent">
			<h2 class="text-center">Ephemeral</h2>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default force-transparent bordered">
					<div class="panel-body">
						<h3>Admin Control Panel</h3>

						<div class="col-lg-3 col-md-3">
							<a class = "list-group-item" href = "<?php echo base_url() . 'index.php?/Admin/displayPortalConfig' ?>">
								Portal Configuration
							</a>
						</div>

						<div class="col-lg-9 col-md-9">
							<div class="panel-body">
								<ul class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" href="#permissions">Permissions</a></li>
								  <li><a data-toggle="tab" href="#delete">Delete</a></li>
								  <li><a data-toggle="tab" href="#ban">Ban</a></li>
								  <li><a data-toggle="tab" href="#block-ip">Block IP</a></li>
								</ul>

								<div class="tab-content">
								  <div id="permissions" class="tab-pane fade in active">
								    <h3>Permissions</h3>
								    <div class="row">
								    	<div class="col-lg-4">
								    		<h4>Username</h4>
								    	</div>
								    	<div class="col-lg-5">
								    		<h4>Admin</h4>
								    	</div>
								    </div>
								    <form method="POST" id="permissions" action= "<?php echo base_url() . 'index.php?/Admin/permissions' ?>">
								    
									    <? foreach ($users as $user){ ?>
									    <div class="row">
									    	<div class="col-lg-4 col-md-4">
												<?= $user['username'] ?>
									  		</div>
									    	<div class="col-lg-5 col-md-5">
									    	<input style="display:none;" type="text" name="userid[]" id="userid" value="<?=$user['user_id']?>" />
									     	<input type="hidden" name="isAdmin[]" id="isAdmin" value="0" /><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
									    	</div>
									    </div>
									    <?	}?>

									    <div class = "form-group row col-md-6 search-buttons">
											<input type = "submit" id = "save" name = "save" class = "btn btn-primary" value = "Save"  />
										    <button type="reset" class="btn btn-primary">Reset</button>
										</div>

									</form>									
								  </div><!--End of Permissions-->

								  <div id="delete" class="tab-pane fade">
								    <h3>Delete Account</h3>
								    <div class="row">
								    	<div class="col-lg-4">
								    		<h4>Username</h4>
								    	</div>
								    	<div class="col-lg-5">
								    		<h4>Delete Account</h4>
								    	</div>
								    </div>

								    <form method="POST" id="delete" action= "<?php echo base_url() . 'index.php?/Admin/delete' ?>">
								    
									    <? foreach ($users as $user){ ?>
									    <div class="row">
									    	<div class="col-lg-4 col-md-4">
												<?= $user['username'] ?>
									  		</div>
									    	<div class="col-lg-5 col-md-5">
									    	<input style="display:none;" type="text" name="userid[]" id="userid" value="<?=$user['user_id']?>" />
									     	<input type="hidden" name="delete[]" id="delete" value="0" /><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
									    	</div>
									    </div>
									    <?	}?>

									    <div class = "form-group row col-md-6 search-buttons">
											<input type = "submit" id = "save" name = "save" class = "btn btn-primary" value = "Save"  />
										    <button type="reset" class="btn btn-primary">Reset</button>
										</div>

									</form>	
								    
								  </div>

								  <div id="ban" class="tab-pane fade">
								    <h3>Ban Account</h3>

								    <div class="row">
								    	<div class="col-lg-4">
								    		<h4>Username</h4>
								    	</div>
								    	<div class="col-lg-5">
								    		<h4>Ban User</h4>
								    	</div>
								    </div>

								    <form method="POST" id="ban" action= "<?php echo base_url() . 'index.php?/Admin/ban' ?>">
								    
									    <? foreach ($users as $user){ ?>
									    <div class="row">
									    	<div class="col-lg-4 col-md-4">
												<?= $user['username'] ?>
									  		</div>
									    	<div class="col-lg-5 col-md-5">
									    	<input style="display:none;" type="text" name="userid[]" id="userid" value="<?=$user['user_id']?>" />
									     	<input type="hidden" name="active[]" id="active" value="0" /><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
									    	</div>
									    </div>
									    <?	}?>

									    <div class = "form-group row col-md-6 search-buttons">
											<input type = "submit" id = "save" name = "save" class = "btn btn-primary" value = "Save"  />
										    <button type="reset" class="btn btn-primary">Reset</button>
										</div>
									</form>		
								  </div>

								  <div id="block-ip" class="tab-pane fade">
								    <h3>Block IP Address</h3>

								    <div class="row">
								    	<div class="col-lg-4">
								    		<h4>Username</h4>
								    	</div>
								    	<div class="col-lg-5">
								    		<h4>Block IP</h4>
								    	</div>
								    </div>

								    <form method="POST" id="block" action= "<?php echo base_url() . 'index.php?/Admin/block' ?>">
								    
									    <? foreach ($users as $user){ ?>
									    <div class="row">
									    	<div class="col-lg-4 col-md-4">
												<?= $user['username'] ?>
									  		</div>
									    	<div class="col-lg-5 col-md-5">
									    	<input style="display:none;" type="text" name="userid[]" id="userid" value="<?=$user['user_id']?>" />
									     	<input type="checkbox" name="block[]" id="block" />
									    	</div>
									    </div>
									    <?	}?>

									    <div class = "form-group row col-md-6 search-buttons">
											<input type = "submit" id = "save" name = "save" class = "btn btn-primary" value = "Save"  />
										    <button type="reset" class="btn btn-primary">Reset</button>
										</div>
									</form>		
								  </div>
								</div><!--End of tab content-->
							</div><!--End of Panel Body-->
						</div><!--End of Div-->
					</div>
				</div>
			</div><!--End of Panel-->
		</div>
	</div>


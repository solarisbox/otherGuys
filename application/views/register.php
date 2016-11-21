<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ephemeral - Login</title>	
</head>
<body class="home">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<form method = "POST" id = "registerForm" action = "<?php echo base_url() . 'index.php?/Register/register' ?>">
					<div class="panel panel-eph">
						<div class="panel-heading">
							<h3>Register</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<?php echo validation_errors()?>
								</div>
								<div class="col-xs-12">
									<div class = "form-group">
										<label for = "username">Username:</label>
										<input type = "text" id = "username" name = "username" class = "form-control" />
									</div>
									<div class = "form-group">
										<label for = "password">Password:</label>
										<input type = "password" id = "password" name = "password" class = "form-control" />
									</div>
									<div class = "form-group">
										<label for = "passwordConfirm">Confirm Password:</label>
										<input type = "password" id = "passwordConfirm" name = "passwordConfirm" class = "form-control" />
									</div>
									<div class = "form-group">
										<label for = "email">Email Address:</label>
										<input type = "text" id = "email" name = "email" class = "form-control" />
									</div>
									<div class = "form-group">
										<label for = "private">Private Account:</label>
										<input type = "checkbox" id = "private" name = "private" class = "form-check" />
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row">
								<div class="col-xs-12">
									<input type = "submit" id = "submit" name = "submit" class = "btn btn-primary btn-block"  />
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
 	if($this->uri->segment(1)=='Login')
 	{
	 	echo "<script>$('#loginNav').addClass('active');</script>";
	 }
?>

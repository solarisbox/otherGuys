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

<div id="wrap" class = "container-fluid ">
	
	<div class = "row text-center">
		<h1>Register</h1>
		<hr style = "width: 40%">
	</div>
	
	<div class = "row">
		<div class = "row" style = "width:40%; margin:0 auto;" "> 
			<div class = "row">
				<?php echo validation_errors()?>
			</div>
		
			<div class = "row">
				<form method = "POST" id = "registerForm" action = "<?php echo base_url() . 'index.php?/Register/register' ?>">
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
					<div class = "form-group">
						<input type = "submit" id = "submit" name = "submit" class = "btn btn-primary"   />
					</div>
				</form>
			</div>
		</div>	
	</div>			
	
</div>
<?php
 	if($this->uri->segment(1)=='Login')
 	{
	 	echo "<script>$('#loginNav').addClass('active');</script>";
	 }
?>

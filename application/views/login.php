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

<div id="wrap" class = "container-fluid  text-center">
	<div class = "row" style = "width:40%; margin:0 auto;">
		<h1>Login</h1>
		<hr style = "width: 40%">
		<?= form_open("Login/loginuser") ?>
		<div class = "form-group">
			<?= form_label('Username:', 'username'); ?> 
			<br>
			<?= form_input(
					array(
							'name' => 'username',
				 			'id' => 'username', 
							'value' => set_value('username',""),
							'class' => 'form-control'
						)
					);
			?> 
		</div>
		
		<div class = "form-group">
			<?= form_label('Password:', 'password'); ?> 
			<br>
			<?= form_input(
					array(
							'name' => 'password',
					 		'id' => 'password', 
							'type' => 'password',
					 		'value' => set_value('password',""),
							'class' => 'form-control'
						)
					);
		?> 		
		</div>
		
		<div>
			<?= form_submit(
					array('name' =>'loginsubmit', 
							'value' =>'Submit',
							'class' => 'btn btn-primary')
					); 
			?>
		</div>
				
		<?= form_fieldset_close(); ?>
		<?= form_close() ?>		
	</div>
				
	<div class = "row">
		or
	</div>
	
	<div class = "row">
		<a class = "btn btn-primary" href = "<?php echo base_url() . 'index.php?/Register'?>">Register</a>
	</div>
</div>
<?php
 	if($this->uri->segment(1)=='Login')
 	{
	 	echo "<script>$('#loginNav').addClass('active');</script>";
	 }
?>

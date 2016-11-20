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
				<?= form_open("Login/loginuser") ?>
				<div class="panel panel-eph">
					<div class="panel-heading">
						<h2>Login</h2>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
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
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div>
									<?= form_submit(
										array('name' =>'loginsubmit',
											'value' =>'Submit',
											'class' => 'btn btn-primary btn-block')
									);
									?>
								</div>
								<div class="visible-xs"><br /></div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div>
									<a class = "btn btn-primary btn-block" href = "<?php echo base_url() . 'index.php?/Register'?>">Register</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_fieldset_close(); ?>
				<?= form_close() ?>
			</div>
		</div>
	</div>
<?php
	if($this->uri->segment(1)=='Login')
	{
		echo "<script>$('#loginNav').addClass('active');</script>";
	}
?>

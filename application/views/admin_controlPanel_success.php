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
							<a class = "list-group-item" href = "<?php echo base_url() . 'index.php?/Admin/displayControlPanel' ?>">
								Admin Control Panel
							</a>
						</div>

						<div class="col-lg-9 col-md-9">
							<div class="panel-body">
								<h2>Changes have been saved.</h2>
							</div><!--End of Panel Body-->
						</div><!--End of Div-->
					</div>
				</div>
			</div><!--End of Panel-->
		</div>
	</div>


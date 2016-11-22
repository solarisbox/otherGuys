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
							<button class="btn btn-primary admin-btn" data-toggle="tab" href="#permissions">Permissions</button> </br>
							<button class="btn btn-primary admin-btn" >Delete Account</button> </br> 
							<button class="btn btn-primary admin-btn" >Ban Account</button> </br>
							<button class="btn btn-primary admin-btn" >Block IP Address</button> </br>
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
								    <p>Place Holder</p>
								  </div>
								  <div id="delete" class="tab-pane fade">
								    <h3>Delete Account</h3>
								    <p>Place Holder</p>
								  </div>
								  <div id="ban" class="tab-pane fade">
								    <h3>Ban Account</h3>
								    <p>Place Holder</p>
								  </div>
								  <div id="block-ip" class="tab-pane fade">
								    <h3>Block IP Address</h3>
								    <p>Place Holder</p>
								  </div>
								</div><!--End of tab content-->
							</div><!--End of Panel Body-->
						</div><!--End of Div-->
					</div>
				</div>
			</div><!--End of Panel-->
		</div>
	</div>


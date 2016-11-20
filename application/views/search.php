<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>
<body class="home">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="panel panel-eph">
					<div class="panel-body">
						<h3>Advanced Search</h3>
						<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
						<p>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	if($this->uri->segment(1)=='Search')
	{
		echo "<script>$('#searchNav').addClass('active');</script>";
	}
?>

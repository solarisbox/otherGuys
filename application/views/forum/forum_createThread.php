<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Create New Thread</title>
</head>
<body class="home">
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div id="results"></div>
		</div>
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<form class="form-horizontal" id="new-thread" action = "<?php echo base_url() . 'index.php/Forum/createThread' ?>" method = "POST">
				<div class="panel panel-eph">
					<div class="panel-heading">
						<h3>Create New Thread</h3>
					</div>
					<div class="panel-body">
						<div class = "col-xs-12">
							<?php echo validation_errors(); ?>
						</div>
					
						<div class="col-xs-12">
							<div class="row">
								<div class="form-group">
									<label for="title" class="control-label">Title</label>
									<input type="text" name = "title" class="form-control" id="title" placeholder="Title Thread">
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="body" class="control-label">Post</label>
									<textarea type="text" rows="10" style="height:100%;" name = "body" class="form-control" id="body" placeholder="Thread Post..."></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div style = "display: inline-block">
										<label class = "checkbox">
											Private
										</label>
									</div>
									
									<div style = "display: inline-block">
										<input type = "checkbox" name = "private" />	
									</div>
								</div>
							</div>
							<div class="row">
								<div class ="row">
									<strong>Expires in...</strong>
								</div>
							
								<div class="form-group">
									<div class ="row">
										<div class = "col-sm-4">
											<input type = "text" name = "time_number" placeholder = "Digit" id = "time_number" class = "form-control" />
										</div>
										
										<div class = "col-sm-8">
											<select name = "time_unit" id = "selectTimeUnit" class = "form-control">
												<option value = "minutes">Minutes</option>
												<option value = "hours">Hours</option>
												<option value = "days">Days</option>
												<option value = "weeks">Weeks</option>
												<option value = "months">Months</option>
												<option value = "years">Years</option>
												<option value = "never">Never</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<?php if(isset($topics) && sizeof($topics) > 0): ?>
								<div class = "row">	
									<div class = "form-group">						
										<label for = "topic">
											Topic
										</label>
										<br />
										<select name = "topic" class = "form-control" style = "width: 50%">
											<?php foreach($topics as $topic): ?>
												<option value = "<?php echo $topic['topic_id']; ?>">
													<?php echo $topic['title']; ?>
												</option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<input type = "submit" value = "Submit" class = "btn btn-primary" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(
		function()
		{
			$("#selectTimeUnit").change(
				function()
				{
					var time_unit = $(this).val();
					
					if(time_unit == "never")
					{
						$("#time_number").prop("disabled", true);
					}
					else 
					{
						$("#time_number").prop("disabled", false);
					}
				}
			);
		}
	);
</script>
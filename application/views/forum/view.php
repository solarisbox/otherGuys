<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>
<body>
	<?php 
		function formatDate($date)
		{
			return date("F j, Y<\b\\r> g:i A", strtotime($date));
		}	
	?>
<div id="wrap" class="container">
	<div class="row">
      <!--left-->
      <div class="col-md-2 col-lg-2" id="leftCol">
        <ul class="nav nav-stacked" id="sidebar">
          <li><a href="#sec0">Forum Index</a></li>
          <li><a href="#sec1">Cat 1</a></li>
          <li><a href="#sec2">Cat 2</a></li>
          <li><a href="#sec3">Cat 3</a></li>
          <li><a href="#sec4">Cat 4</a></li>
          <li><a href="#sec5">Cat 5</a></li>
        </ul>
      </div><!--left-->
      
      <!--right-->
      <div class="col-md-10 col-lg-10"> 
        
        <div class = "panel panel-default">
					<div class = "panel-heading">
						<?= $thread_item['title']?>
					</div>
					<div class = "panel-body">
						<table class = "table table-bordered table-striped">
							<tr>
								<td  class = "col-sm-3 text-center">
									<div class = "row">
										<?php echo $thread_item['member'] == null ? "Anonymous" : $thread_item['member']; ?>
									</div>
									<div class = "row" style = "font-size: 13px;">
										<?php echo formatDate($thread_item['post_date']); ?>
									</div>
								</td>
										
								<td  class = "col-sm-9">
									<?php echo $thread_item['body']; ?>
								</td>
							</tr>
							<?php foreach($messages as $message): ?>
								<tr>
										<td class = "col-sm-2 text-center">
											<div class = "row">
												<?php echo $message['author']; ?>
											</div>
											<div class = "row" style = "font-size: 13px;">
												<?php echo formatDate($message['post_date']); ?>
											</div>
										</td>
										
										<td class = "col-sm-10">
											<?php echo $message['body']; ?>
										</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>	     

				<div style = "margin:0 auto; width: 50%">
					<form method = "POST" action = "<?php echo base_url() . 'index.php/Forum/postMessage'; ?>">					
						<div class = "form-group">
							<input type = "hidden" name = "thread" value = "<?php echo $thread_item['thread_id']?>" />
							<textarea class = "form-control" name = "body"></textarea>
						</div>
				     	<button class="btn btn-primary" type = "submit">Post Reply</button>
					</form>
				</div>

	  </div>
	</div><!--/row-->
</div><!--/container-->

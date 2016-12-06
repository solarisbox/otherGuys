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
			date_default_timezone_set('America/New_York');
			return date("F j, Y<\b\\r> g:i A", strtotime($date));
		}	
	?>
	
	<script>
		function loadParticipants()
		{
				$.ajax({
					type: "POST",
					data: {thread: "<?php echo $thread_item['thread_id']?>"},
					url: "<?php echo base_url() . 'index.php?/Forum/ajaxLoadThreadParticipantsTable/'; ?>",
					success:
						function(data)
						{							
							$("#thread-participants-container").html(data);
						}
				});
		}
		
		function removeParticipant(participant)
		{
			$.ajax({
				type: "POST",
				data: {participant: participant},
				url: "<?php echo base_url() . 'index.php?/Forum/removeParticipant/'; ?>",
				success: function()
				{
					loadParticipants();
				}
			});
		}

		function addParticipant(user)
		{
			$.ajax({
				type: "POST",
				data: {user: user, thread: "<?php echo $thread_item['thread_id']; ?>"},
				url: "<?php echo base_url() . 'index.php?/Forum/addParticipant/'; ?>",
				success: function()
				{
					loadParticipants();
				}
			});
		}

		$(document).ready(function()
		{
			$(document).on("focus", "#lookupUsers", 
						function()
						{
							if ( !$("#lookupUsers").data("autocomplete") )
							{
								$("#lookupUsers").autocomplete({
									appendTo: $("#lookupUsers").next(),
									source: function(request, response)
									{
										$.ajax({
								            url: "<?php echo base_url() . 'index.php?/Forum/lookupUsers'; ?>",
								            data: { term: $("#lookupUsers").val().trim()},
								            dataType: "JSON",
								            type: "POST",
								            success: function(data) 
								            { 
								                response(data);
								            },
								            error: function (xhr, ajaxOptions, thrownError)
								            {
								                console.log(xhr.status + " " + thrownError);
								            }
								        });
									},
									select: function(event, ui)
									{
										$("#lookupUsers").val(ui.item.label);
										addParticipant(ui.item.value);
										return false;
									}
								});
							}
						}
					);
		}
		);
		
	</script>
	
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
	        <?php if (isset($_SESSION['userid']) && isThreadAuthor($_SESSION['userid'], $thread_item['thread_id']) && $thread_item['private'] == 1): ?>
	        	<div class = "row text-center">
	        			<button class="btn btn-primary" onclick = "loadParticipants()" data-toggle="modal" data-target=".participants-modal">View Participants</button>
	        	</div>
	        	<br />
	        <?php endif; ?>
        
        	<div class = "row">
	        	<div class = "panel panel-default">
						<div class = "panel-heading">
							<?= $thread_item['title']?>
						</div>
						<div class = "panel-body">
							<table class = "table table-bordered table-striped">
								<tr>
									<td  class = "col-sm-3 text-center">
										<div class = "row">
											<img src = "<?php echo $thread_item['avatar']  ?>" />
										</div>
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
													<img src = "<?php echo $message['avatar']; ?>" />
												</div>
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

<?php if(isset($_SESSION['userid']) && isThreadAuthor($_SESSION['userid'], $thread_item['thread_id']) && $thread_item['private'] == 1): ?>
	<div class="modal fade participants-modal" id="participants-modal" tabindex="-1" role="dialog" aria-labelledby=".participants-modal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title" id="myModalLabel">Thread Participants</h4>
	      </div>
	      <div class="modal-body">
	      	<div class = "form-group">
				<input type = "text" id = "lookupUsers"  placeholder = "Lookup participant..." style = "width:50%"/>
				<div><!--  Autocomplete anchor --></div>
			</div>
	
	        <div id = "thread-participants-container"></div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>
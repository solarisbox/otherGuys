<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>
<body>

<div id="wrap" class="center-container">
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
      	
	      	<div class = "row text-center">
	      		<a href="<?= base_url(); ?>index.php?/Forum/displayCreateThread" class = "btn btn-primary">New Thread</a>
	      	</div>
      		<br />
      		<?php if(isset($threads) && sizeof($threads) > 0): ?>
		      	<table class = "table table-bordered forumTable">      	
			   		<tbody>
				        <?php foreach ($threads as $thread): ?>
					        <tr>
					        	<td class = "col-sm-10">
					        		<h4>
					        			<a style = "" href = "<?php echo site_url('forum/'.$thread['thread_id']); ?>">
					        				<?php echo $thread['title']; ?>
					        			</a>
					        		</h4>
					        		
					        		<hr>
					        						        		
					        		<?php 
					 
					        			if(strlen($thread['body']) > 200)
					        			{
					        				echo substr($thread['body'], 0, 200) . '...';
					        			}
					        			else 
					        			{
					        				echo $thread['body'];
					        			}				        		
					        		?>
					        		
					        	</td>
					        	
					        	<td class = "col-sm-2">
					        		<div class = "text-center">
					        			Posts
					        			<br />
					        			<h4>
						        			<?php echo $thread['message_count']; ?>
						        		</h4>
					        		</div>
					        	</td>
					        </tr>
				        <?php endforeach; ?>      
			        </tbody> 	
				</table>
			
				<br />
				<br />
				<br />
				
				<?php else: ?>
					<div class = "row text-center">
						Unfortunately there are currently no active threads
					</div>
			<?php endif; ?>
	 	</div>
	</div><!--/row-->
</div><!--/container-->







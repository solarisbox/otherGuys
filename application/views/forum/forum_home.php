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
		<div class="hidden-xs hidden-sm col-md-2" id="leftCol">
			<ul class="nav nav-stacked" id="sidebar">
				<li><a href="#sec0">Forum Index</a></li>
				<li><a href="#sec1">Section A</a></li>
				<li><a href="#sec2">Section B</a></li>
				<li><a href="#sec3">Section C</a></li>
				<li><a href="#sec4">Section D</a></li>
				<li><a href="#sec5">Section E</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-md-10">
			<div class="row">
				<div class="col-xs-12">
					<a href="<?= base_url(); ?>index.php?/Forum/displayCreateThread" class = "btn btn-primary">Create New Thread</a>
					<br /><br />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php if(isset($threads) && sizeof($threads) > 0): ?>
						<table class="table table-bordered forumTable clear-border">
							<tbody>
								<?php foreach ($threads as $thread): ?>
									<tr>
										<td class="clear-border" style="padding: 0px;">
											<div class="panel panel-eph">
												<div class="panel-heading">
													<div class="row">
														<div class="col-xs-6 text-left">
															<a href="<?php echo site_url('forum/'.$thread['thread_id']); ?>">
																<?php echo $thread['title']; ?>
															</a>
															
															<?php echo $thread['is_thread_expiring'] ? "| <span style = 'color:red;'>Expiring</span>" : ""; ?>
															
														</div>
														<div class="col-xs-6 text-right">
															Posts: <?php echo $thread['message_count']; ?>
														</div>
													</div>
												</div>
												<div class="panel-body">
													<div class="row">
														<div class="col-xs-12">
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
														</div>
													</div>
												</div>
											</div>
											<br />
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<?php else: ?>
						<div class="text-center">
							Unfortunately there are currently no active threads
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>







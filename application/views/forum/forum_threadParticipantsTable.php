		<script>				
				var table = "participants-table";
				var ajaxMethod = "ajaxLoadThreadParticipants";
				var controller = "Forum";
				var data = {"thread": "<?php echo $thread_item['thread_id']; ?>"};
				var baseUrl = "<?php echo base_url(); ?>";
		</script>
		<script src = "<?php echo assetUrl() . 'js/custom.js'?>"></script>
		<table id = "participants-table" class = "table table-striped table-bordered">
			<thead>
				<tr>
					<th data-field = "username" class = "column-sortable">
						Username&nbsp;<i class="fa fa-fw fa-sort"></i>
					</th>
					<?php if($includeActions): ?>
						<th data-field = "username" class = "column-sortable">
							Actions
						</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($participants) && sizeof($participants) > 0): ?>
					<?php $this->load->view('forum/forum_threadParticipantsAjax'); ?>
				<?php else: ?>
					<tr><td>No participants</td></tr>
				<?php endif; ?>
			</tbody>
		</table>
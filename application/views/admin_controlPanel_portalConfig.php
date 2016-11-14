<div style = "width: 50%;margin:0 auto;">

	<div class = "row">
		<h2>Portal Configuration</h2>
	</div>
	
	<br />

	<div class = "row">
		<table class = "table table-striped table-bordered">
			<thead>
				<tr>
					<th>
						CONFIGURATION
					</th>		
					<th>
						VALUE
					</th>
				</tr>
			</thead>
			
			<tbody>
			<?php foreach($portalConfigs as $config): ?>
				<tr>
					<td><?php echo $config['config_key']; ?></td>
					<td>
						<form method = "POST" action = "<?php echo base_url() . 'index.php?/Admin/saveConfig'?>">
							<input type = "hidden" name = "configKey" value = "<?php echo $config['config_key']; ?>" />
							<div class = "inline">
								<input style = "width: 90%" type = "text" name = "configValue" value ="<?php echo $config['config_value']; ?>" />
							</div>
							<div class = "inline">
								<button class = "styleless-button"><span class = "glyphicon glyphicon-ok-sign" ></span></button>
							</div>
						</form>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
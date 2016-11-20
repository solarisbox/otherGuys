<body class="home">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<div class="panel panel-eph">
					<div class="panel-heading">
						<h3>Portal Configuration</h3>
					</div>
					<div class="panel-body">
						<div style="overflow-x:auto;">
							<table class="table table-bordered">
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
											<form method="POST" action="<?php echo base_url() . 'index.php?/Admin/saveConfig'?>">
												<input type="hidden" name="configKey" value="<?php echo $config['config_key']; ?>" />
												<div class="inline">
													<input style="width: 90%; color: black; min-width: 100px;" type="text" name="configValue" value="<?php echo $config['config_value']; ?>" />
												</div>
												<div class="inline">
													<button class="styleless-button"><span class ="glyphicon glyphicon-ok-sign"></span></button>
												</div>
											</form>
										</td>
									</tr>
								<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-xs-12">
								<a class="btn btn-primary btn-block" href="<?php echo base_url() . 'index.php?/Admin/displayControlPanel' ?>">
									Return
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
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
			<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
				<div class="panel panel-eph">
					<div class="panel-body">
						<h1>Advanced Search</h1>
						<form method = "POST" id = "searchForm centered" action = "<?php echo base_url() . 'index.php?/Search/execute_search' ?>">
							<div class= "row col-lg-12 col-md-12 col-sm-6">
								<div class = "form-group ">
									<?= form_label('Keywords:', 'keywords'); ?>
									<br>
									<?= form_input(
										array(
											'name' => 'keywords',
											'id' => 'keywords',
											'value' => set_value('keywords',""),
											'class' => 'form-control default-search'
										)
									);
									?>
								</div>

								<div class = "form-group">
									<?= form_label('Username:', 'username'); ?>
									<br>
									<?= form_input(
										array(
											'name' => 'username',
											'id' => 'username',
											'value' => set_value('username',""),
											'class' => 'form-control default-search'
										)
									);
									?>
								</div>
							</div>
							</br>

							<!--Search Options-->
							<div cass="row row col-lg-12 col-md-12 col-sm-6">
								<h3 class="search-options"><strong>Search Options</strong></h3>

								<div class="form-group">
									<h4>Sort Results by</h4>
									<?
									$option = array(
									        'title'         	=> 'Title',
									        'post_date'    	=> 'Thread Start Date',
									        'username'			=> 'Username',
										); 

									$js = array(
									        'id'    => 'option',
									        'name'	=> 'option',
									        'class' => 'form-control default-search',
									        'style' => 'width:30%;',
										);
									echo form_dropdown('option', $option, '', $js);

									?>
								</div>

								<div class="form-group">
									<?
									$sort = array(
									        'ASC'   => 'Ascending',
									        'DESC'  => 'Descending',
										); 

									$js_sort = array(
									        'id'    => 'sort',
									        'name'	=> 'sort',
									        'class' => 'form-control default-search',
									        'style' => 'width:30%;;',
										);

									echo form_dropdown('sort', $sort, '', $js_sort);
									?>
								</div>
							</div>

							<div class = "form-group row col-md-6 search-buttons">
								<input type = "submit" id = "search" name = "search" class = "btn btn-primary" value = "Search"  />
							    <button type="reset" class="btn btn-primary">Clear</button>
							</div>	
						</form><!--End of Form-->
					</div>
				</div>
			</div>
		</div>
	</div>




	
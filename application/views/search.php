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
						<form method = "POST" id = "searchForm centered" action = "<?php echo base_url() . 'index.php?/Search/search' ?>">

							<div class= "row col-lg-12 col-md-12 col-sm-6">
								<div class = "form-group ">
									<label for = "keywords">Search by Keywords:</label>
									<input type = "text" id = "keywords" name = "keywords" class = "form-control default-search" />
								</div>

								<div class = "form-group">
									<label for = "username">Search by User Name:</label>
									<input type = "text" id = "username" name = "username" class = "form-control default-search" />
									<select id="username-search" class="form-control default-search" style="margin-top:1%;">
										<option>All Posts</option>
										<option>Threads Started</option>
									</select>
								</div>
							</div>

							</br>

							<!--Search Options-->
							<div cass="row row col-lg-12 col-md-12 col-sm-6">

								<h3 class="search-options"><strong>Search Options</strong></h3>

								<div class="form-group">
									<h4>Find Threads with</h4>
									<select id="number-of-posts" class="form-control default-search" style="width:400px;float:left;">
										<option>At Least</option>
										<option>At Most</option>
									</select>
									<label for="replies" style="padding-top:0.5%;">Replies</label>
	    							<input type="text" class="form-control" id="replies" style="width:5%;float:left;margin-left:2%;margin-right:2%;">
    							</div>

    							<div class="form-group">
								<h4>Find Posts from</h4>
									<select id="date-of-posts" class="form-control default-search" style="width:400px;">
										<option>Any Date</option>
										<option>Yesterday</option>
										<option>2 Weeks ago</option>
										<option>A Month ago</option>
										<option>3 Months ago</option>
										<option>6 Months ago</option>
										<option>A Year ago</option>
									</select>
								</div>

								<div class="form-group">
									<h4>Sort Results by</h4>
									<select id="date-of-posts" class="form-control default-search" style="width:400px;">
										<option>Relevancy</option>
										<option>Title</option>
										<option>Number of Replies</option>
										<option>Number of Views</option>
										<option>Thread Start Date</option>
										<option>Last Posting Date</option>
										<option>Username</option>
									</select>
								</div>

								<div class="form-group">
									<select id="date-of-posts-order" class="form-control default-search" style="width:400px;">
										<option>in Descending Order</option>
										<option>in Ascending Order</option>
									</select>
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
<?php
	if($this->uri->segment(1)=='Search')
	{
		echo "<script>$('#searchNav').addClass('active');</script>";
	}
?>






	
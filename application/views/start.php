<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Start New Thread</title>
</head>
<body>
<div id="wrap">
	<section class="container">
		<div class="row">
			<div id="results"></div>
			<h3 style="margin-top:05%;">Start New Thread</h3>
	    	<div class="col-md-10">
			 <form class="form-horizontal" id="new-thread">
			    <div class="form-group">
			        <label for="envan" class="control-label col-xs-2">Title</label>
			        <div class="col-xs-10">
			            <input type="text" class="form-control" id="title" placeholder="Title Thread">
			        </div>
			    </div>
		          
		        <div class="form-group">
			        <label for="envan" class="control-label col-xs-2">Post</label>
			        <div style="height:100%;"class="col-xs-10">
			          <textarea type="text" rows="10" style="height:100%;" class="form-control" id="message" placeholder="Thread Post..."></textarea>
			        </div>
		        </div>
			         
			    		
			    <div class="form-group">
			        <div class="col-xs-offset-2 col-xs-10">
			            <label class="radio-inline">
					      <input type="radio" name="optradio">Minutes - 5
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="optradio">Minutes - 60
					    </label>
					    <label class="radio-inline">
					      <input type="radio" name="optradio">Never 
					    </label>
			        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-xs-offset-2 col-xs-10">
			            <button type="button" class="btn btn-primary" onclick="post();">Submit</button>
			        </div>
			    </div>
			</form>
	      </div>

	      
	  </div>
	</section>
</div>

<script type="text/javascript">

function post(){
	var title = $('#title').val();
	var message = $('#message').val();

	$.post('message.php' , {posttitle:title,postbody:message},
		function(data)
		{
			$('#results').html(data);
		});
}
</script>
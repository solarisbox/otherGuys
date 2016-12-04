<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>

<body class="home">

<div id="wrap" class="center-container">
	<div class="row">
      <!--left-->
      <div class="col-md-2 col-lg-2" id="leftCol">
      </div><!--left-->
      
      <!--right-->
      <div class="col-md-10 col-lg-10"> 
      	<div class="col-md-2 col-lg-2 pull-right"><h4 class="thread-info">Last Post</h4></div>
      	<div class="col-md-2 col-lg-2 pull-right"><h4 class="thread-info">Views</h4></div> 
     		
     		<? if($results == false) {
     			echo '<h3>Sorry, no results were found.</h3>';
          echo '<h4>Search suggestions:</h4>';
          echo '<ul>
                  <li>Check your spelling.</li>
                  <li>Try more general words.</li>
                  <li>Try different words that mean the same thing.</li>
                </ul>';
          echo '<script>
                  window.onload = function() {
                    $(".thread-info").hide();
                  }
                </script>';
     		} else {
           foreach ($results as $row) {  ?>
          <div class="row">
            <div class="col-md-8 col-lg-8">
              <h3><a class="thread-title" href="<?php echo site_url('forum/'.$row['thread_id']); ?>"><?= $row['title']?></a></h3>
              <p>Started By: <?= $row['username'] ?>,</p>
            </div>
          <div style="height:100%;" class="col-md-2 col-lg-2"><h5 style="margin-top:33%;">test</h5></div>
          <div class="col-md-2 col-lg-2"><h5 style="margin-top:33%;">test</h5></div>
          </div> 
          <hr>
          <? } 
        }?>       	

	    </div>
	</div><!--/row-->
</div><!--/container-->







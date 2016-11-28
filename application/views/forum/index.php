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
      	
      	<div class="col-md-8 col-lg-8 align-right">
      		<a href="<?= base_url(); ?>index.php?/Start"><button class="btn btn-primary">New Thread</button></a>
      	</div>
      	<div class="col-md-2 col-lg-2 align-right"><h4>Last Post</h4></div>
      	<div class="col-md-2 col-lg-2 align-right"><h4>Views</h4></div> 
   	
        <? foreach ($threads as $row) {  ?>
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <h3><a class="thread-title" href="<?php echo site_url('forum/'.$row['thread_id']); ?>"><?= $row['title']?></a></h3>
            <p><?= $row['body']?></p>
            <p>ID: <?= $row['thread_id']?></p>
          </div>
        <div style="height:100%;" class="col-md-2 col-lg-2"><h5 style="margin-top:33%;">test</h5></div>
        <div class="col-md-2 col-lg-2"><h5 style="margin-top:33%;">test</h5></div>
        </div> 
        <hr>
        <? } ?>       	

	    </div>
	</div><!--/row-->
</div><!--/container-->







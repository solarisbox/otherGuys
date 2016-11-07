<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>
<body>

<div id="wrap" class="container">
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

        
        <? foreach ($threads as $row) {  ?>
          <div class="row">
            <div class="col-md-10 col-lg-10">
              <h3><?= $row['title']?></h3>
              <p><?= $row['message']?></p>
              <p><?= $row['member']?></p>
            </div>
          </div>
          <hr>           
        <? } ?>

        <a href="<?= base_url(); ?>index.php?/Start"><button class="btn btn-primary">Post Reply</button></a>

	  </div>
	</div><!--/row-->
</div><!--/container-->

<?
 	if($this->uri->segment(1)=='Thread'){
	 	echo "<script>$('#threadNav').addClass('active');</script>";
	 }

?>


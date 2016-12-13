<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forum Index</title>
</head>

<body class="home">

<div id="wrap" class="container">
	<div class="row">
      <!--left-->
      <div class="col-xs-2" id="leftCol">
      </div><!--left-->
      
      <!--right-->
      <div class="col-xs-10">

     		<?php if($results == false) {
                echo '<h3>Sorry, no results were found.</h3>';
                echo '<h4>Search suggestions:</h4>';
                echo '<ul><li>Check your spelling.</li><li>Try more general words.</li><li>Try different words that mean the same thing.</li></ul>';
     		}
            else {
                foreach ($results as $row) {  ?>
                <div class="row">
                <div class="col-xs-12">
                    <h3><a class="thread-title" href="<?php echo site_url('forum/'.$row['thread_id']); ?>"><?= $row['title']?></a></h3>
                    <p>Started By: <?= $row['username'] ?>,</p>
                </div>
                <div class="col-xs-12"><?= $row['body'] ?></div>
                </div>
                <hr>
                <?php }
            }?>
	        </div>
	</div><!--/row-->
</div><!--/container-->







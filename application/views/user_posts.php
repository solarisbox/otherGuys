<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ephemeral Board</title>
</head>
<body class="home">
<div class="container">
    <?php
    foreach ($results as $row) {
        $date = substr($row['join_date'], 0, 10);
    } ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-eph">
                <div class="panel-heading">
                    <h3><?= $username ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2" id="leftCol">
                            <img src="http://placehold.it/64x64" alt="Image" style="display: block;padding: 10px 15px;">
                            <ul class="nav nav-stacked user-profile">
                                <li style="position: relative;display: block;padding: 10px 15px;">
                                    Date Joined:<br/>
                                    <?= $date ?><br/>
                                    Posts: <?= $total_posts ?><br/>
                                </li>
                            </ul>
                            <ul class="nav nav-stacked user-profile" id="sidebar">
                                <li><a href="<?= base_url(); ?>index.php?/UserPanel">Control Panel</a></li>
                                <li><a href="<?= base_url(); ?>index.php?/profileSettings">Profile Settings</a></li>
                                <li><a href="<?= base_url(); ?>index.php?/contactList">Contact List</a></li>
                                <li><a href="<?= base_url(); ?>index.php?/userPosts">All Posts</a></li>
                                <li><a href="<?= base_url(); ?>index.php?/userThreads">Threads</a></li>
                            </ul>
                        </div><!--left-->
                        <div class="col-xs-10">
                            <h2>Your Posts</h2>
                            <div>
                                <? foreach ($posts as $row) { ?>
                                    <h3>
                                        <a style="" href= <?php echo site_url('forum/' . $row['thread_id']); ?>>
                                            <?= $row['title'] ?>
                                        </a>
                                    </h3>
                                    <p class="body-excerpt"> <?= $row['body'] ?> </p>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
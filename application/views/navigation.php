<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span>
      </button> 
      <a class="navbar-brand" href="<?= base_url(); ?>index.php?/Home">Ephemeral</a>
    </div><!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="forumNav">
          <a href="<?= base_url(); ?>index.php?/Forum">Forum</a>
        </li>
        <li id="searchNav">
          <a href="<?= base_url(); ?>index.php?/Search">Search</a>
        </li>
        <li id="aboutNav">
          <a href="<?= base_url(); ?>index.php?/About">About</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php $isUserLoggedIn = isset($_SESSION['userid']) && !empty($_SESSION['userid']); ?>
        <?php if($isUserLoggedIn): ?>
        <li>
          <a href="<?php echo base_url() . 'index.php?/Admin/displayControlPanel'?>"><span class="glyphicon glyphicon-user"></span></a>
        </li>
        <?php endif; ?>
        <li>
          <a href="<?php echo base_url() . 'index.php?/' . ($isUserLoggedIn ? 'Login/logout' : 'Login'); ?>">
            <?php echo $isUserLoggedIn ? 'Logout' : 'Login';?>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text">
        </div><button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
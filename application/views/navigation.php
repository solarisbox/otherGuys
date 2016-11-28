<div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url(); ?>index.php?/Home">Ephemeral</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left scroll hidden-lg hidden-md hidden-sm">
                <li id="forumNav">
                  <a href="<?= base_url(); ?>index.php?/Forum">Forum</a>
                </li>
                <li id="searchNav">
                  <a href="<?= base_url(); ?>index.php?/Search">Search</a>
                </li>
                <li id="aboutNav">
                  <a href="<?= base_url(); ?>index.php?/About">About</a>
                </li>
                <?php $isUserLoggedIn = isset($_SESSION['userid']) && !empty($_SESSION['userid']); ?>
                <?php if($isUserLoggedIn): ?>
                  <li>
                    <a href="<?php echo base_url() . 'index.php?/Admin/displayControlPanel'?>">Account</a>
                  </li>
                <?php endif; ?>
                <li>
                  <a href="<?php echo base_url() . 'index.php?/' . ($isUserLoggedIn ? 'Login/logout' : 'Login'); ?>">
                    <?php echo $isUserLoggedIn ? 'Logout' : 'Login';?>
                  </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left hidden-xs">
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
            <ul class="nav navbar-nav navbar-right hidden-xs">
				<?php $isUserLoggedIn = isset($_SESSION['userid']) && !empty($_SESSION['userid']); ?>
				<?php if($isUserLoggedIn): ?>
					<li>
						<a href="<?php echo base_url() . 'index.php?/Admin/displayControlPanel'?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Account</a>
					</li>
				<?php endif; ?>
				<li>
					<a href="<?php echo base_url() . 'index.php?/' . ($isUserLoggedIn ? 'Login/logout' : 'Login'); ?>">
						<?php echo $isUserLoggedIn ? 'Logout' : 'Login';?>
					</a>
				</li>
            </ul>
            <form class="navbar-form navbar-right hidden-xs hidden-sm" role="search" action="<?php echo base_url() . 'index.php?/Search/navbar_search' ?>" method="POST">
      				<div class="form-group">
      					<input class="form-control" placeholder="Search" type="text" name="searchBar" >
      				</div>
      				<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span><div class="dropdown clearfix">
   <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li><a tabindex="-1" href="#">Action</a></li>
      <li><a tabindex="-1" href="#">Another action</a></li>
      <li><a tabindex="-1" href="#">Something else here</a></li>
      <li class="divider"></li>
      <li><a tabindex="-1" href="#">Separated link</a></li>
    </ul>
  </div>
      </button>
      <a class="navbar-brand" href="#"><img src="http://placehold.it/140x34/000000/ffffff/&amp;text=LOGO" alt=""></a>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li id="homeNav"><a href="<?= base_url(); ?>index.php?/Home">Home</a></li>
        <li id="forumNav"><a href="<?= base_url(); ?>index.php?/Forum">Forum</a></li>
        <li id="searchNav"><a href="<?= base_url(); ?>index.php?/Search">Search</a></li>
	 	<li id="aboutNav"><a href="<?= base_url(); ?>index.php?/About">About</a></li>
      </ul>      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">
          <span class="glyphicon glyphicon-user"></span>
        </a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>

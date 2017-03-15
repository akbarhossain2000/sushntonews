<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<!-- Mirrored from demo.themeum.com/html/newedge/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Nov 2016 06:51:29 GMT -->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta name="author" content="">

  <!-- FAVICON -->
  <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon.png">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <?php wp_head(); ?>
</head> <!-- head -->
<body  class="sticky-header">
	<div class="body-innerwrapper">
	
	<!--==================================
	=            START Header            =
	===================================-->
	<header>
		<!-- top-bar -->
		<div id="newedge-top-bar">
			<div class="container">
				<div class="row">
					<div id="logo" class="col-xs-4 col-sm-3 col-md-3 hidden-sm hidden-xs">
						<a href="<?php bloginfo( 'home' ); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/presets/preset1/logo.png" alt="logo"></a>
					</div> <!-- //logo -->
					<div class="col-sm-12 col-md-9">
						<div class="top-right">
							<div class="newedge-date">
								<span>	<?php echo date('l, j F Y'); ?> </span>
							</div> <!-- //date -->

							
							<div class="newedge-search">
								<div class="search-icon-wrapper">
									<i class="fa fa-search"></i>
								</div>
								<div class="search-wrapper">
									<form action="#" method="post">
										<input name="searchword" maxlength="200" class="inputboxnewedge-top-search" type="text" size="20" placeholder="Search ...">
										<i id="search-close" class="fa fa-close"></i>
									</form>
								</div> <!-- //search-wrapper -->
							</div> <!-- //search -->
						</div> <!-- //top-right -->
					</div> 
				</div> <!-- //row -->
			</div> <!-- //container -->
		</div> <!-- //top-bar -->

		<!-- navigation mobile version -->
		<div id="mobile-nav-bar" class="mobile-nav-bar">
			<div class="container">
				<div class="row">
					<div class="visible-sm visible-xs col-sm-12">
						<div id="logo" class="mobile-logo pull-left">
							<a href="<?php bloginfo( 'home' ); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/presets/preset1/logo.png" alt="logo"></a>
						</div>
						<a id="offcanvas-toggler" class="pull-right" href="#"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
		</div>

		<!-- navigation -->
		<nav id="navigation-bar" class="navigation hidden-sm hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					<?php
						if( function_exists( 'wp_nav_menu' ) ){
							wp_nav_menu(array(
								'theme_location'	=> 'theme_main_menu',
								'menu_id'			=> '',
								'menu_class'		=> 'list-inline megamenu-parent',
								'container'			=> 'ul',
								'walker'			=> new themeslug_walker_nav_menu(),
							));
						}
					?>
						<!--<ul class="list-inline megamenu-parent">
							<li class="active"><a href="index.html">Home</a></li>
							<li class="has-child"><a href="video_gallery.html">Video Story</a>
								<div class="dropdown-inner">
									<ul class="dropdown-items">
										<li><a href="#">News</a></li>
										<li><a href="#">Other</a></li>
									</ul>
								</div>
							</li>
							<li class="has-child"><a href="advertisement.html">Article/ Write Up</a>
								<div class="dropdown-inner">
									<ul class="dropdown-items">
										<li><a href="#">Economic</a></li>
										<li><a href="#">Environment</a></li>
										<li><a href="#">Other</a></li>
									</ul>
								</div>
							</li>
							<li class="has-child"><a href="photo_gallery.html">Photo Gallery</a>
								<div class="dropdown-inner">
									<ul class="dropdown-items">
										<li><a href="#">Personal</a></li>
										<li><a href="#">Other</a></li>
									</ul>
								</div>
							</li>
							<li class="has-child"><a href="about.html">Biograpgy</a>
								<div class="dropdown-inner">
									<ul class="dropdown-items">
										<li><a href="#">conference and country visit</a></li>
									</ul>
								</div>
							</li>
							<li class="has-child"><a href="#">Achievements</a>
								<div class="dropdown-inner">
									<ul class="dropdown-items">
										<li><a href="#">Prize</a></li>
										<li><a href="#">Training</a></li>
										<li><a href="#">conference cover</a></li>
										<li><a href="#">Country visit</a></li>
									</ul>
								</div>
							</li>
							<li><a href="#">Research Work</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>-->
					</div> <!-- col-sm-12 -->
				</div> <!-- //row -->
			</div> <!-- //container -->
		</nav> <!-- //navigation -->
	</header>
	<!--====  End of Header  ====-->

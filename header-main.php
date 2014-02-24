<?php
/**
 * Part of the Header for our theme.
 *
 * Displays all of the <head> section and everything from <div id="page"> through <div>
 *
 * @package Flint
 * @sub-package Pageroll
 */
?>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
    	<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
			<h1 class="screen-reader-text"><?php _e( 'Menu', 'flint' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'flint' ); ?>"><?php _e( 'Skip to content', 'flint' ); ?></a></div>
      <div class="container">
              
        <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
                  
        <!-- Be sure to leave the brand out there if you want it shown -->
        <a class="navbar-brand hidden-lg" href="<?php echo home_url(); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
                  
        <div class="nav-collapse collapse navbar-responsive-collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => false, 'walker' => new Pageroll_Bootstrap_Menu ) ); ?>
          <form method="get" class="navbar-form pull-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <input type="text" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search" style="width: 200px;">
          </form>
        </div><!-- .nav-collapse -->
      </div><!-- .container -->
		</nav><!-- .navbar -->
	<?php if (current_theme_supports('custom-header')) { ?>
		<div class="container">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
			<a class="logo col-lg-3 col-offset-1 hidden-sm" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" alt="" />
			</a>
		<?php } /* if ( ! empty( $header_image ) ) */ ?>
		</div>
	<?php } /* if (current_theme_supports('custom-header')) */ ?>
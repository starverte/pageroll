<?php
/**
 * Part of the Header for our theme.
 *
 * Displays all of the <head> section and everything from <div id="page"> through <hgroup>
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
            <div class="navbar-inner">
                <div class="container">
                    
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
                    
                    <!-- Be sure to leave the brand out there if you want it shown -->
                    <a class="brand hidden-desktop" href="<?php echo home_url(); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
                    
                    <div class="nav-collapse collapse">
                    	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'container' => false, 'theme_location' => 'primary', 'walker' => new Pageroll_Bootstrap_Menu ) ); ?>
                        <form id="app-btn" class="navbar-form pull-right hidden-desktop">
                          <a class="btn btn-large btn-block" href="<?php echo esc_url( home_url( '/driverapp' ) ); ?>">Driver Application</a>
                        </form>
                        <?php if ( is_user_logged_in() ) { ?>
                        <form class="navbar-form pull-right">                          
													<a class="btn btn-large btn-block hidden-desktop" href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>
                        	<a class="btn visible-desktop" href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>
                        </form>
                        <?php } ?>
                    </div><!-- .nav-collapse -->
                </div><!-- .container -->
            </div><!-- .navbar-inner -->
        </nav><!-- .navbar -->
	<?php if (current_theme_supports('custom-header')) { ?>
		<hgroup class="row-fluid">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>
			<a class="logo span3 hidden-phone" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" alt="" />
			</a>
		<?php } /* if ( ! empty( $header_image ) ) */ ?>
        <div class="span9 visible-desktop" id="app-btn">
            <div class="site-branding span5 offset6">
            	<h3>Owner-Operators Wanted</h3>
                <a class="btn btn-large btn-block" href="<?php echo esc_url( home_url( '/driverapp' ) ); ?>">Apply Now</a>
            </div>
        </div>
		</hgroup>
	<?php } /* if (current_theme_supports('custom-header')) */ ?>
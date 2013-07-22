<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Flint
 * @sub-package Pageroll
 */
get_template_part ( 'header' , 'head' );
is_front_page() || is_home() ? get_template_part ( 'header' , 'front' ) : get_template_part ( 'header' , 'main' ); ?>

	</header><!-- #masthead -->

	<div id="main" class="site-main container-fluid">

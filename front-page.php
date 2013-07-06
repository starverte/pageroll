<?php
/**
 * The template for displaying the front page
 *
 * Template file used to render the Site Front Page,
 * whether the front page displays the Blog Posts Index
 * or a static page.
 *
 * @package Flint
 * @sub-package Pageroll
 *
 */

get_header(); ?>

  	<div id="primary" class="content-area span9">
			<div id="content" class="site-content" role="main">
            <?php if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'primary' ] ) ) {
				$nav = wp_get_nav_menu_object( $locations[ 'primary' ] );
				$nav_items = wp_get_nav_menu_items($nav->term_id); }
				$n = count($nav_items); $i = 0;
				foreach ( (array) $nav_items as $key => $nav_item ) {
					if(++$i === $n) { $pages .= $nav_item->object_id; }
					else {$pages .= $nav_item->object_id . ', '; }
				}
				$pageroll = get_posts( array( 'post_type' => 'page', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'include' => $pages ) );
                foreach( $pageroll as $post ) : setup_postdata($post); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endforeach; // end of the loop. ?>
        
        <?php flint_content_nav( 'nav-below' ); ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

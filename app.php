<?php
/**
 * Template Name: Driver Application
 *
 * @package Flint
 */

get_header(); ?>

	<div id="primary" class="content-area span12">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( current_user_can('edit_pages') ) { ?>
                    <div class="container-fluid">
                        <div class="row-fluid">
                                    <a class="btn btn-small" href="<?php echo get_edit_post_link(); ?>" style="float:right;">Edit</a>
                        </div>
                    </div>
                <?php } ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                
                    <div class="entry-content">
                    <?php if ( is_user_logged_in() ) { ?>
                        <form class="form-horizontal">
                          <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                              <input type="text" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="inputPassword">Password</label>
                            <div class="controls">
                              <input type="password" id="inputPassword" placeholder="Password">
                            </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <label class="checkbox">
                                <input type="checkbox"> Remember me
                              </label>
                              <button type="submit" class="btn">Sign in</button>
                            </div>
                          </div>
                        </form>
                        <?php } else { ?>
                        <p>Please login or register an account before accessing the driver application.</p>
                        <a class="btn" href="<?php echo wp_login_url( get_permalink() ); ?>">Login</a>
                        <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/wp-login.php?action=register&redirect_to=wp-login.php?redirect_to=driverapp' ) ); ?>">Register</a>
                        <?php }
                            flint_link_pages( array(
                                'before' => '<div class="pagination"><ul>',
                                'after'  => '</ul></div>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

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
                    <?php if ( is_user_logged_in() ) {
						global $current_user;
      					get_currentuserinfo(); ?>
                        <form class="form-horizontal">
                          <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                              <input type="text" id="user_firstname" placeholder="First" value="<?php echo $current_user->user_firstname; ?>">
                              <input class="input-mini" maxlength="1" type="text" id="user_middle" placeholder="M.I." value="">
                              <input type="text" id="user_lastname" placeholder="Last" value="<?php echo $current_user->user_lastname; ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_email">Email</label>
                            <div class="controls">
                              <input type="email" id="user_email" placeholder="Email" value="<?php echo $current_user->user_email; ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_birthdate">Birthdate</label>
                            <div class="controls">
                              <input type="date" id="user_birthdate" placeholder="mm/dd/yyyy">
                            </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <button type="submit" class="btn">Save</button>
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

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
      							get_currentuserinfo();
										$user_id = $current_user->ID;
										if (isset($_POST['user_firstname'])) {  update_user_meta($user_id, 'first_name', $_POST['user_firstname']); }
										if (isset($_POST['user_middle'])) {  update_user_meta($user_id, 'middle', $_POST['user_middle']); }
										if (isset($_POST['user_lastname'])) {  update_user_meta($user_id, 'last_name',$_POST['user_lastname']); }
										if (isset($_POST['user_email'])) {  update_user_meta($user_id, 'email',$_POST['user_email']); }
											else { update_user_meta($user_id, 'email',$current_user->user_email); }
										if (isset($_POST['user_birthdate'])) {
											$user_birthdate = $_POST['user_birthdate'] . ' ' . '12:00 AM';
											update_user_meta($user_id, 'birthdate', strtotime($user_birthdate));
										} ?>
                        <form class="form-horizontal" action="<?php echo get_permalink(); ?>" method="post">
                          <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                              <input type="text" name="user_firstname" placeholder="First" value="<?php echo get_user_meta ($user_id, 'first_name', true); ?>">
                              <input class="input-mini" maxlength="1" type="text" name="user_middle" placeholder="M.I." value="<?php echo get_user_meta ($user_id, 'middle', true); ?>">
                              <input type="text" name="user_lastname" placeholder="Last" value="<?php echo get_user_meta ($user_id, 'last_name', true); ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_email">Email</label>
                            <div class="controls">
                              <input type="email" name="user_email" placeholder="Email" value="<?php echo get_user_meta ($user_id, 'email', true); ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_birthdate">Birthdate</label>
                            <div class="controls">
                              <input type="date" name="user_birthdate" placeholder="mm/dd/yyyy" value="<?php $birthdate = get_user_meta ($user_id, 'birthdate', true); if ($birthdate != ''){  echo date( 'm/d/Y', $birthdate );} ?>">
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
                      <?php } ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

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

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                
                    <div class="entry-content">
                    <?php if ( is_user_logged_in() ) {
										global $current_user;
      							get_currentuserinfo();
										$user_id = $current_user->ID;
										if (isset($_POST['user_firstname']))			{  update_user_meta($user_id, 'first_name',			$_POST['user_firstname']); }
										if (isset($_POST['user_middle']))					{  update_user_meta($user_id, 'middle',					$_POST['user_middle']); }
										if (isset($_POST['user_lastname']))				{  update_user_meta($user_id, 'last_name',			$_POST['user_lastname']); }
										if (isset($_POST['user_streetaddress']))	{  update_user_meta($user_id, 'street_address',	$_POST['user_streetaddress']); }
										if (isset($_POST['user_city']))						{  update_user_meta($user_id, 'city',						$_POST['user_city']); }
										if (isset($_POST['user_state']))					{  update_user_meta($user_id, 'state',					$_POST['user_state']); }
										if (isset($_POST['user_zip']))						{  update_user_meta($user_id, 'zip',						$_POST['user_zip']); }
										if (isset($_POST['user_address_months']))	{  update_user_meta($user_id, 'address_months',	$_POST['user_address_months']); }
										if (isset($_POST['user_birthdate'])) {
											$user_birthdate = $_POST['user_birthdate'] . ' ' . '12:00 AM';
											update_user_meta($user_id, 'birthdate', strtotime($user_birthdate));
										}
										$united_states = array('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY'); ?>
                        <form class="form-horizontal" action="<?php echo get_permalink(); ?>" method="post">
                        <p>You may save your progress and come back at anytime.</p>
                          <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                              <input type="text" name="user_firstname" placeholder="First" value="<?php echo get_user_meta ($user_id, 'first_name', true); ?>">
                              <input class="input-mini" maxlength="1" type="text" name="user_middle" placeholder="M.I." value="<?php echo get_user_meta ($user_id, 'middle', true); ?>">
                              <input type="text" name="user_lastname" placeholder="Last" value="<?php echo get_user_meta ($user_id, 'last_name', true); ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_streetaddress">Street Address</label>
                            <div class="controls">
                              <input type="text" name="user_streetaddress" placeholder="1234 Anystreet Drive" value="<?php echo get_user_meta ($user_id, 'street_address', true); ?>">
                              <input class="input-medium" type="text" name="user_city" placeholder="City" value="<?php echo get_user_meta ($user_id, 'city', true); ?>">
                              <select class="input-small" name="user_state">
                              	<option value="">State</option>
                              <?php
																$user_state = get_user_meta ($user_id, 'state', true);
																foreach ( $united_states as $united_state ) {
																	echo '<option value="' . $united_state . '"'
																		. selected( $user_state, $united_state, false )
																		. '>'. $united_state . '</option>';
																}
															?>
                              </select>
                              <input class="input-small" type="text" name="user_zip" placeholder="Zip Code" value="<?php echo get_user_meta ($user_id, 'zip', true); ?>">
                            </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <span class="help-inline help-before">I have lived at the above address for </span><input class="input-mini" type="date" name="user_address_months" value="<?php echo get_user_meta ($user_id, 'address_months', true); ?>"><span class="help-inline">months.</span>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="user_birthdate">Birthdate</label>
                            <div class="controls">
                              <input class="input-small" type="date" name="user_birthdate" placeholder="mm/dd/yyyy" value="<?php $birthdate = get_user_meta ($user_id, 'birthdate', true); if ($birthdate != ''){  echo date( 'm/d/Y', $birthdate );} ?>">
                            </div>
                          </div>
                          <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Save</button>
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

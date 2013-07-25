<?php
/**
 * Part of the application.
 *
 * Displays "Basic Information" section.
 *
 * @package Flint
 * @sub-package Pageroll
 */
?>
                <div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#app-accordion" href="#basic-info"><i class="icon-user"></i> Basic Information</a></div>
                  <div id="basic-info" class="accordion-body collapse <?php if (!isset($_POST['driver-profile-save'])) { echo 'in'; } ?>">
                    <div class="accordion-inner">
                    	<?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "saved")) { ?> <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Basic Information saved.</strong> Continue with the next section, or come back later.</div><?php } ?>
                      <?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "missing")) { ?> <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Basic Information saved.</strong> Feel free to take a break or come back later, but we'll need some more information before we continue.</div><?php } ?>
            					<?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "invalid")) { ?> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Uh-oh.</strong> Let's try that again.</div><?php } ?>
                      <form class="form-horizontal" id="basic-info-form" action="<?php echo get_permalink(); ?>" method="post">
                      
											<?php global $current_user;
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
                      if (isset($_POST['user_birthdate'])) 			{
												$user_birthdate = $_POST['user_birthdate'] . ' ' . '12:00 AM';
												update_user_meta($user_id, 'birthdate', strtotime($user_birthdate));
                      } /* if (isset($_POST['user_birthdate'])) */ ?>
                      
                      	<div class="control-group"></div>
                      
                        <div class="control-group">
                          <label class="control-label">Name</label>
                          <div class="controls">
                            <input type="text" name="user_firstname" placeholder="First" value="<?php echo get_user_meta ($user_id, 'first_name', true); ?>">
                            <input class="input-mini" maxlength="1" type="text" name="user_middle" placeholder="M.I." value="<?php echo get_user_meta ($user_id, 'middle', true); ?>">
                            <input type="text" name="user_lastname" placeholder="Last" value="<?php echo get_user_meta ($user_id, 'last_name', true); ?>">
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
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
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                        <div class="control-group">
                          <div class="controls">
                            <span class="help-inline help-before">How long have you lived at this address? </span><input class="input-mini" type="date" name="user_address_months" value="<?php echo get_user_meta ($user_id, 'address_months', true); ?>"><span class="help-inline">months</span>
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                        <div class="control-group">
                          <label class="control-label" for="user_birthdate">Birthdate</label>
                          <div class="controls">
                            <input class="input-small" type="date" name="user_birthdate" placeholder="mm/dd/yyyy" value="<?php $birthdate = get_user_meta ($user_id, 'birthdate', true); if ($birthdate != ''){  echo date( 'm/d/Y', $birthdate );} ?>">
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                        <div class="control-group">
                          <div class="controls">
                          	<input name="basic-info-save" type="hidden" value="saved">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                      </form><!-- #basic-info-form -->
                    </div><!-- .accordion-inner -->
                  </div><!-- #basic-info -->
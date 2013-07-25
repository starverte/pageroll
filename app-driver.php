<?php
/**
 * Part of the application.
 *
 * Displays "Driver Profile" section.
 *
 * @package Flint
 * @sub-package Pageroll
 */
?>
								<div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#app-accordion" href="#driver-profile"><i class="icon-road"></i> Driver Profile</a></div>
                  <div id="driver-profile" class="accordion-body collapse <?php if (isset($_POST['driver-profile-save'])) { echo 'in'; } ?>">
                    <div class="accordion-inner">
                    	<?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "saved")) { ?> <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Driver Profile saved.</strong> Continue with the next section, or come back later.</div><?php } ?>
                      <?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "missing")) { ?> <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Driver Profile saved.</strong> Feel free to take a break or come back later, but we'll need some more information before we continue.</div><?php } ?>
            					<?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "invalid")) { ?> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Uh-oh.</strong> Let's try that again.</div><?php } ?>
                      <form class="form-horizontal" id="driver-profile-form" action="<?php echo get_permalink(); ?>#driver-profile" method="post">
                      
											<?php global $current_user;
											get_currentuserinfo();
											$user_id = $current_user->ID;
                      if (isset($_POST['user_ssn']))			{  update_user_meta($user_id, 'ssn',			$_POST['user_ssn']); }
                      ?>
                      
                      	<div class="control-group"></div>
                      
                        <div class="control-group">
                          <label class="control-label">Social Security Number</label>
                          <div class="controls">
                            <input type="text" name="user_ssn" placeholder="xxx-xx-xxxx" value="<?php echo get_user_meta ($user_id, 'ssn', true); ?>">
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                        
                        
                        <div class="control-group">
                          <div class="controls">
                          	<input name="driver-profile-save" type="hidden" value="saved">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div><!-- .controls -->
                        </div><!-- .control-group -->
                        
                      </form><!-- #driver-profile-form -->
                    </div><!-- .accordion-inner -->
                  </div><!-- #driver-profile -->
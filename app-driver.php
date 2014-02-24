<?php
/**
 * Part of the application.
 *
 * Displays "Driver Profile" section.
 *
 * @package Flint\Pageroll
 */
?>
								<div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#app-accordion" href="#driver-profile"><i class="icon-road"></i> Driver Profile</a></div>
                  <div id="driver-profile" class="accordion-body collapse <?php if (isset($_POST['driver-profile-save'])) { echo 'in'; } ?>">
                    <div class="accordion-inner">
                    	<?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "saved")) { ?> <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Driver Profile saved.</strong> Continue with the next section, or come back later.</div><?php } ?>
                      <?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "missing")) { ?> <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Driver Profile saved.</strong> Feel free to take a break or come back later, but we'll need some more information before we continue.</div><?php } ?>
            					<?php if (isset($_POST['driver-profile-save']) and ($_POST['driver-profile-save'] == "invalid")) { ?> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Uh-oh.</strong> Let's try that again.</div><?php } ?>
                      <form class="form-horizontal" id="driver-profile-form" action="<?php echo get_permalink(); ?>#driver-profile" method="post">
                      
											<?php $united_states = array('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY');
											global $current_user;
											get_currentuserinfo();
											$user_id = $current_user->ID;
                      if (isset($_POST['user_ssn']))			{
												$ssn = preg_replace("/[^0-9]+/", '',$_POST['user_ssn']);
												update_user_meta($user_id, 'ssn', $ssn);
											}
											if (!empty($_POST['user_license_state']))			{  update_user_meta($user_id, 'license_state',	$_POST['user_license_state']); }
											if (!empty($_POST['user_license_number']))		{  update_user_meta($user_id, 'license_number',	$_POST['user_license_number']); }
											
											if (!empty($_POST['user_license_exp_date']))	{
												$user_license_exp_date = str_replace('-', '/', $_POST['user_license_exp_date']);
												update_user_meta($user_id, 'license_exp_date', strtotime($user_license_exp_date));
                      } /* if (!empty($_POST['user_birthdate'])) */
                      ?>
                      
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label" for="user_ssn">SSN</label>
                          <div class="col-lg-10 col-sm-10"><input class="form-control" type="text" name="user_ssn" placeholder="xxx-xx-xxxx" value="<?php echo preg_replace("/([0-9]{3})([0-9]{2})([0-9]{4})/", "$1-$2-$3", get_user_meta ($user_id, 'ssn', true)); ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Driver's License</label>
                          <div class="col-lg-6 col-sm-6 col-4"><input class="form-control" type="text" name="user_license_number" placeholder="License Number" value="<?php echo get_user_meta ($user_id, 'license_number', true); ?>"></div>
                          <div class="col-lg-2 col-sm-2 col-4"><select class="form-control" name="user_license_state">
                              <option value="">State</option>
                              <?php
                              $user_state = get_user_meta ($user_id, 'license_state', true);
                              foreach ( $united_states as $united_state ) {
                                echo '<option value="' . $united_state . '"'
                                . selected( $user_state, $united_state, false )
                                . '>'. $united_state . '</option>';
                              }
                              ?>
                            </select></div>
                            <div class="col-lg-2 col-sm-2 col-4"><input class="form-control" type="date" name="user_license_exp_date" placeholder="Exp Date" value="<?php $license_exp_date = get_user_meta ($user_id, 'license_exp_date', true); if (!empty($license_exp_date)){  echo date( 'm/d/Y', $license_exp_date );} ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Can you provide proof of age?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_proof_age = get_user_meta ($user_id, 'proof_age', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_proof_age" value="yes" <?php checked( $user_proof_age, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_proof_age" value="no" <?php checked( $user_proof_age, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you ever worked for Driveby Transport?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_prev_driver = get_user_meta ($user_id, 'prev_driver', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_prev_driver" value="yes" <?php checked( $user_prev_driver, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_prev_driver" value="no" <?php checked( $user_prev_driver, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Are you currently employed?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_employed = get_user_meta ($user_id, 'employed', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_employed" onchange="employed_yes()" value="yes" <?php checked( $user_employed, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_employed" onchange="employed_no()" value="no" <?php checked( $user_employed, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group collapse" id="permission-employer">
                          <label class="col-lg-10 col-sm-10 col-offset-2">May we contact your current employer?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_permission_employer = get_user_meta ($user_id, 'permission_employer', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_permission_employer" value="yes" <?php checked( $user_permission_employer, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_permission_employer" value="no" <?php checked( $user_permission_employer, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group collapse" id="last-employed">
                          <label class="col-lg-10 col-sm-10 col-offset-2">When were you last employed?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2"><input class="form-control" type="date" name="user_last_employed" placeholder="mm/dd/yyyy" value="<?php echo  get_user_meta ($user_id, 'last_employed', true); ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you ever been denied a license, permit, or privilege to operate a motor vehicle?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_denied_license = get_user_meta ($user_id, 'denied_license', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_denied_license" id="denied_license_yes" value="yes" <?php checked( $user_denied_license, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_denied_license" id="denied_license_no" value="no" <?php checked( $user_denied_license, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you ever had a license, permit, or privilege revoked or suspended?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_suspended_license = get_user_meta ($user_id, 'suspended_license', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_suspended_license" id="suspended_license_yes" value="yes" <?php checked( $user_suspended_license, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_suspended_license" id="suspended_license_no" value="no" <?php checked( $user_suspended_license, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you ever been convicted of a felony?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_felony = get_user_meta ($user_id, 'felony', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_felony" id="felony_yes" value="yes" <?php checked( $user_felony, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_felony" id="felony_no" value="no" <?php checked( $user_felony, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you had any accidents within the past 3 years?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_accidents = get_user_meta ($user_id, 'accidents', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_accidents" id="accidents_yes" value="yes" <?php checked( $user_accidents, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_accidents" id="accidents_no" value="no" <?php checked( $user_accidents, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-10 col-sm-10 col-offset-2">Have you had any traffic convictions or forfeitures within the past 3 years?</label>
                          <div class="col-lg-10 col-sm-10 col-offset-2">
                          	<?php $user_charges = get_user_meta ($user_id, 'charges', true); ?>
                          	<label class="radio-inline">
                              <input type="radio" name="user_charges" id="charges_yes" value="yes" <?php checked( $user_charges, 'yes' ); ?>>
                              Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="user_charges" id="charges_no" value="no" <?php checked( $user_charges, 'no' ); ?>>
                              No
                            </label>
                        	</div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                        	<div class="col-lg-2 col-sm-2"></div>
                          <div class="col-lg-10 col-sm-10">
                          	<input name="driver-profile-save" type="hidden" value="saved">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div><!-- .form-group -->
                        
                      </form><!-- #driver-profile-form -->
                    </div><!-- .accordion-inner -->
                  </div><!-- #driver-profile -->
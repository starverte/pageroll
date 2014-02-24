<?php
/**
 * Part of the application.
 *
 * Displays "Basic Information" section.
 *
 * @package Flint\Pageroll
 */
?>
                <div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#app-accordion" href="#basic-info"><i class="icon-user"></i> Basic Information</a></div>
                  <div id="basic-info" class="accordion-body collapse <?php if (!isset($_POST['driver-profile-save'])) { echo 'in'; } ?>">
                    <div class="accordion-inner">
                    	<?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "saved")) { ?> <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Basic Information saved.</strong> Continue with the next section, or come back later.</div><?php } ?>
                      <?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "missing")) { ?> <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Basic Information saved.</strong> Feel free to take a break or come back later, but we'll need some more information before we continue.</div><?php } ?>
            					<?php if (isset($_POST['basic-info-save']) and ($_POST['basic-info-save'] == "invalid")) { ?> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Uh-oh.</strong> Let's try that again.</div><?php } ?>
                      <form class="form-horizontal" id="basic-info-form" action="<?php echo get_permalink(); ?>" method="post">
                      
											<?php $united_states = array('AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY');
                      global $current_user;
											get_currentuserinfo();
											$user_id = $current_user->ID;
                      if (!empty($_POST['user_firstname']))				{  update_user_meta($user_id, 'first_name',			$_POST['user_firstname']); }
                      if (!empty($_POST['user_middle']))					{  update_user_meta($user_id, 'middle',					$_POST['user_middle']); }
                      if (!empty($_POST['user_lastname']))				{  update_user_meta($user_id, 'last_name',			$_POST['user_lastname']); }
                      if (!empty($_POST['user_streetaddress']))		{  update_user_meta($user_id, 'street_address',	$_POST['user_streetaddress']); }
                      if (!empty($_POST['user_city']))						{  update_user_meta($user_id, 'city',						$_POST['user_city']); }
                      if (!empty($_POST['user_state']))						{  update_user_meta($user_id, 'state',					$_POST['user_state']); }
                      if (!empty($_POST['user_zip']))							{  update_user_meta($user_id, 'zip',						$_POST['user_zip']); }
											
                      if (!empty($_POST['user_time_address']))		{
												if ($_POST['user_time_address_units'] == 'months')		{ $time_address = $_POST['user_time_address']; }
												if ($_POST['user_time_address_units'] == 'years')	{ $time_address = $_POST['user_time_address']*12; }
												update_user_meta($user_id, 'time_address', $time_address);
											} /* if (!empty($_POST['user_time_address'])) */
											
                      if (!empty($_POST['user_birthdate'])) 			{
												$user_birthdate = str_replace('-', '/', $_POST['user_birthdate']);
												update_user_meta($user_id, 'birthdate', strtotime($user_birthdate));
                      } /* if (!empty($_POST['user_birthdate'])) */ ?>
                      
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Name</label>
                          <div class="col-lg-4 col-sm-4 col-4"><input class="form-control" type="text" name="user_firstname" placeholder="First" value="<?php echo get_user_meta ($user_id, 'first_name', true); ?>"></div>
                          <div class="col-lg-1 col-sm-2 col-3"><input class="form-control" maxlength="1" type="text" name="user_middle" placeholder="M.I." value="<?php echo get_user_meta ($user_id, 'middle', true); ?>"></div>
                          <div class="col-lg-5 col-sm-4 col-4"><input class="form-control" type="text" name="user_lastname" placeholder="Last" value="<?php echo get_user_meta ($user_id, 'last_name', true); ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label" for="user_streetaddress">Street Address</label>
                          <div class="col-lg-10 col-sm-10"><input class="form-control" type="text" name="user_streetaddress" placeholder="1234 Anystreet Drive" value="<?php echo get_user_meta ($user_id, 'street_address', true); ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label"></label>
                          <div class="col-lg-4 col-sm-4 col-4"><input class="form-control" type="text" name="user_city" placeholder="City" value="<?php echo get_user_meta ($user_id, 'city', true); ?>"></div>
                          <div class="col-lg-2 col-sm-2 col-4"><select class="form-control" name="user_state">
                              <option value="">State</option>
                              <?php
                              $user_state = get_user_meta ($user_id, 'state', true);
                              foreach ( $united_states as $united_state ) {
                                echo '<option value="' . $united_state . '"'
                                . selected( $user_state, $united_state, false )
                                . '>'. $united_state . '</option>';
                              }
                              ?>
                            </select></div>
                          <div class="col-lg-4 col-sm-4 col-4"><input class="form-control" type="text" name="user_zip" placeholder="Zip Code" value="<?php echo get_user_meta ($user_id, 'zip', true); ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                        	<div class="col-lg-2 col-sm-2"></div>
                          <label class="col-lg-4 col-sm-6 control-label" for="user_time_address">How long have you lived at this address?</label>
                          <div class="col-lg-4 col-sm-2 col-6"><input class="form-control" type="number" name="user_time_address" value="<?php $user_time_address = get_user_meta ($user_id, 'time_address', true)/12; echo number_format($user_time_address, 2)	; ?>"></div>
                          <div class="col-lg-2 col-sm-2 col-6"><select class="form-control" name="user_time_address_units"><option value="years">years</option><option value="months">months</option></select></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label" for="user_birthdate">Birthdate</label>
                          <div class="col-lg-10 col-sm-10"><input class="form-control" type="date" name="user_birthdate" placeholder="mm/dd/yyyy" value="<?php $birthdate = get_user_meta ($user_id, 'birthdate', true); if (!empty($birthdate)){  echo date( 'm/d/Y', $birthdate );} ?>"></div>
                        </div><!-- .form-group -->
                        
                        <div class="form-group">
                        	<div class="col-lg-2 col-sm-2"></div>
                          <div class="col-lg-10 col-sm-10">
                          	<input name="basic-info-save" type="hidden" value="saved">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                        </div><!-- .form-group -->
                        
                      </form><!-- #basic-info-form -->
                    </div><!-- .accordion-inner -->
                  </div><!-- #basic-info -->
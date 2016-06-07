<?php
require_once('config/connect.php');
require_once('controller/fungsiAll.php');
error_reporting(E_ALL);

$ck = new Kendaraan();

?>
<!-- Header Start -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<div class="cs-logo">
						<div class="cs-media">
							<figure><a href="index.php"><img src="assets/images/cs-logo.png" alt="" /></a></figure>
						</div>
					</div>
				</div>
				<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
					<div class="cs-main-nav pull-right">
						<nav class="main-navigation">
							<ul>
								<?php
								$menu = $ck->Navbar();
								while ($row = $menu->fetch_array()) {
									# code...
								?>
								<li><a href="<?=$row['link']?>"><?=$row['nama']?></a></li>
								<?php } ?>

								<li class="cs-user-option">
									<div class="cs-login">

										<!-- Modal -->
										
										<div class="modal fade" id="user-sign-in" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<h4>User Sign in</h4>
														<div class="cs-login-form">
															<form>
																<div class="input-holder">
																	<label for="cs-username-1"> <strong>USERNAME</strong> <i class="icon-user-plus2"></i>
																		<input type="text" class="" id="cs-username-1" placeholder="Type desired username">
																	</label>
																</div>
																<div class="input-holder">
																	<label for="cs-login-password-1"> <strong>Password</strong> <i class="icon-unlock40"></i>
																		<input type="password" id="cs-login-password-1" placeholder="******">
																	</label>
																</div>
																<div class="input-holder"> <a class="btn-forgot-pass" data-dismiss="modal" data-target="#user-forgot-pass" data-toggle="modal" href="javascript:;" aria-hidden="true"><i class=" icon-question-circle"></i> Forgot password?</a> </div>
																<div class="input-holder">
																	<input class="cs-color csborder-color" type="submit" value="SIGN IN">
																</div>
															</form>
														</div>
													</div>
													<div class="modal-footer">
														<div class="cs-separator"><span>or</span></div>
														<div class="cs-user-social"> <em>Signin with your Social Networks</em>
															<ul>
																<li><a href="#" data-original-title="facebook"><i class="icon-facebook-f"></i>facebook</a></li>
																<li><a href="#" data-original-title="twitter"><i class="icon-twitter4"></i>twitter</a></li>
																<li><a href="#" data-original-title="google-plus"><i class="icon-google4"></i>google</a></li>
															</ul>
														</div>
														<div class="cs-user-signup"> <i class="icon-user-plus2"></i> <strong>Not a Member yet? </strong> <a class="cs-color" data-dismiss="modal" data-target="#user-sign-up" data-toggle="modal" href="javascript:;" aria-hidden="true">Signup Now</a> </div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal fade" id="user-forgot-pass" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													</div>
													<div class="modal-body">
														<h4>Password Recovery</h4>
														<div class="cs-login-form">
															<form>
																<div class="input-holder">
																	<label for="cs-email-1"> <strong>Email</strong> <i class="icon-envelope"></i>
																		<input type="email" class="" id="cs-email-1" placeholder="Type desired username">
																	</label>
																</div>
																<div class="input-holder">
																	<input class="cs-color csborder-color" type="submit" value="Send">
																</div>
															</form>
														</div>
													</div>
													<div class="modal-footer">
														<div class="cs-user-signup"> <i class="icon-user-plus2"></i> <strong>Not a Member yet? </strong> <a href="javascript:;" data-toggle="modal" data-target="#user-sign-up" data-dismiss="modal" class="cs-color" aria-hidden="true">Signup Now</a> </div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</li>
							</ul>
						</nav>
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End --> 
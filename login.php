<?php
	$pg_title = 'Login';
	$pg_class = 'login';
	$pg_desc = 'Login or sign up here';
	$pg_keywords = 'login, signin, create account';

	require_once 'classes/Config.php';
	require_once 'classes/Account.php';
	require_once 'classes/Constants.php';
	require_once 'classes/FormSanitizer.php';
	require_once 'classes/Session.php';
	// $error=''; // Variable To Store Error Message

	$account = new Account($conn);

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$ut = $_POST['submit'];
		// $location = '';
		
		
		// what type of user
		if(isset($ut)){
			switch ($ut) {
				case 'user':
					// echo "user";
					$un = $_POST['username'];
					$pw = $_POST['password'];
					// $em = $_POST['email'];
					// $ac = $_POST['admin-code'];
					
					// clean up POST data recived from form
					$un = FormSanitizer::sanitizeFormUsername($un);
					$pw = FormSanitizer::sanitizeFormPassword($pw);
					
					// call the class login function, proceed if correct
					$success = $account->userLogin($un, $pw);

					$location = "user.php";
				
				break;
				case 'admin':
					echo "admin";
					// echo "user";
					$un = $_POST['admin-username'];
					$pw = $_POST['admin-password'];
					$pin = $_POST['pin'];
					
					// clean up POST data recived from form
					$un = FormSanitizer::sanitizeFormUsername($un);
					$pw = FormSanitizer::sanitizeFormPassword($pw);
					$pin = FormSanitizer::sanitizeFormPin($pin);
					
					// call the class login function, proceed if correct
					$success = $account->adminLogin($un, $pw, $pin);

					$location = "admin.php";
					
				break;
				case 'register':
					echo "register";
				break;
				default:
					echo "something is wrong";
				break;
			}

			/**
			 * begin SESSION name
			 * then redirect to target
			 * 
			 * @param bool $success = true begin session
			 */ 
			if($success) {

				Session::startSession();
				Session::set('userLoggedIn', $un);
				
				header("Location: " . $location);
				
			}
		
		}

	}

	require_once "includes/header.php";

?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-4">
							<a href="#" class="active" id="user-form-link">User</a>
						</div>
						<div class="col-xs-4">
							<a href="#" id="admin-form-link">Admin</a>
						</div>
						<div class="col-xs-4">
							<a href="#" id="register-form-link">Register</a>
						</div>
					</div>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<?php echo $account->getErrorBS(Constants::$loginFailed); ?>
							<?php echo $account->getErrorBS(Constants::$fieldEmpty); ?>
							<form id="user-form" method="post" role="form" style="display: block;">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" value="" autocomplete="off">
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
								</div>
								<!-- <div class="form-group text-center">
									<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
									<label for="remember"> Remember Me</label>
								</div> -->
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<!-- <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In"> -->
											<!-- <input type="submit" name="usersubmit" name="submit" id="usersubmit" tabindex="4" class="form-control btn btn-default btn-xs" value="Log in"> -->
											<button type="submit" name="submit" class="form-control btn btn-default btn-xs" autocomplete="off" value="user">Log in</button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="#" class="forgot-password">Forgot Password?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form id="admin-form" method="post" role="form" style="display: none;">
								<div class="form-group">
									<input type="text" name="admin-username" tabindex="1" class="form-control" placeholder="Username" value="">
								</div>
								<div class="form-group">
									<input type="password" name="admin-password" tabindex="2" class="form-control" placeholder="Password" autocomplete="">
								</div>
								<div class="form-group">
									<input type="text" name="pin" tabindex="3" class="form-control" placeholder="PIN" value="">
								</div>
								<!-- <div class="form-group text-center">
									<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
									<label for="remember"> Remember Me</label>
								</div> -->
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<!-- <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In"> -->
											<!-- <input type="submit" name="adminsubmit" name="submit" id="adminsubmit" tabindex="4" class="form-control btn btn-default btn-xs" value="Log In"> -->
											<button type="submit" name="submit" id="adminsubmit" tabindex="4" class="form-control btn btn-default btn-xs" value="admin">Log in</button>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<div class="text-center">
												<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
											</div>
										</div>
									</div>
								</div>
							</form>
							<form id="register-form" method="post" role="form" style="display: none;">
								<div class="form-group">
									<input type="text" name="regname" id="registername" tabindex="1" class="form-control" placeholder="Username" value="">
								</div>
								<div class="form-group">
									<input type="email" name="regemail" id="registeremail" tabindex="1" class="form-control" placeholder="Email" value="">
								</div>
								<!-- <div class="form-group">
									<input type="password" name="regpassword" id="registerpassword" tabindex="2" class="form-control" placeholder="Password" autocomplete="">
								</div>
								<div class="form-group">
									<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" autocomplete="">
								</div> -->
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<!-- <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now"> -->
											<!-- <input type="submit" name="submit" id="register-submit" tabindex="4" class="form-control btn btn-default btn-xs" value="Register Now"> -->
											<button type="submit" name="submit" id="registersubmit" tabindex="4" class="form-control btn btn-default btn-xs" value="register">Register</button>
										</div>
									</div>
								</div>
								<p>You will recieve a temporary password for a user account via email. This can be changed later</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once "includes/footer.php"; ?>
<script type="text/javascript" src="assets/js/loginSelection.js"></script>
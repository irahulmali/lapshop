<?php
	include "conn.php";
?>
<html>
	<head>
		<?php
			include "all.php";
		?>
	</head>
	<body>
		<?php
			include "nav.php";
		?>
		<?php

			// Checking for form submission.
			if(isset($_POST['submit']) && !empty($_POST['submit'])){
				
				// Validating CSRF token.
				if( $_SESSION['token'] == $_POST['csrf']){
					
					// Validating captcha.
					if(isset($_POST['captcha']) && ($_POST['captcha'] == $_SESSION['captcha'])){
						
						// Validating name fields.
						if(ctype_alpha($_POST['fname']) && ctype_alpha($_POST['lname'])){
							
							// Assigning name variables.
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							
							// Validating email format.
							if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
								
								// Assigning email variable.
								$email = $_POST['email'];

								// Checking for duplicate email.
								$dup = "SELECT uid FROM user WHERE email = '$email'";

								if($result = mysqli_query($conn, $dup)){
									if($rows = mysqli_num_rows($result) >= 1){
										echo "<div class='alert alert-danger'>Email already registered.</div>";
									}else{
										// Validating mobile number.
										if(preg_match('/^\d{10}$/', $_POST['mobile'])){
											$mobile = $_POST['mobile'];

											// Validating password.
											if($_POST['pass'] == $_POST['cpass']){
												if(preg_match('/^[a-zA-Z0-9]{6,30}$/', $_POST['pass'])){
													$password = sha1($_POST['pass']);
													
													// Validating user type.
													if($_POST['type'] == 'customer' || $_POST['type'] == 'seller'){
														$type = $_POST['type'];
														
														if($type == 'customer'){
															$query = "INSERT INTO user(fname,lname,email,mobile,password)
															 VALUES('$fname','$lname','$email','$mobile','$password')";	
														}else if ($type == 'seller'){
															$query = "INSERT INTO seller(fname,lname,email,mobile,password)
															 VALUES('$fname','$lname','$email','$mobile','$password')";
														}
		
														$result = mysqli_query($conn, $query);
														
														// Checking for successful execution of query.
														if($result == TRUE){
															$_SESSION['registered'] = 1;
															if($type == 'customer'){
																header('Location: ./products.php');
															}else if($type == 'seller'){
																header('Location: ./seller.php');
															}
														}else{
															echo "<div class='alert alert-danger'>Registration Unsuccessful</div>";
														}
													}else{
														echo "<div class='alert alert-danger'>Invalid user type.</div>";
													}
												}else{
													echo "<div class='alert alert-danger'>Invalid character in password.</div>";
												}
											}else{
												echo "<div class='alert alert-danger'>Password don't match.</div>";
											}
										}else{
											echo"<div class='alert alert-danger'>Invalid mobile number.</div>";
										}
									}
								}
							}else{
								echo"<div class='alert alert-danger'>Invalid email.</div>";
							}
						}else{
							echo "<div class='alert alert-danger'>Invalid characters in name fields.</div>";
						}
					}else{
						echo"<div class='alert alert-danger'>Invalid captcha.</div>";
					}
				}
			}
		?>
		<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1  ">
							<form action="" method="POST">
								<input type="hidden" name="csrf" value="<?php echo gencsrftoken(); ?>">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<h2>Registration</h2>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-6 col-lg-6 col-md-4 form-group">
											<input class="form-control" type="text" name="fname" placeholder="First name" value="<?php if(!empty($_POST['fname'])){ echo $_POST['fname']; }?>">
										</div>
										<div class="col-sm-6 col-lg-6 col-md-4 form-group">
											<input class="form-control" type="text" name="lname" placeholder="Last name" value="<?php if(!empty($_POST['lname'])){ echo $_POST['lname']; }?>">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-12 col-md-8 col-sm-12">
											<input class="form-control" type="text" name="email" placeholder="Email Id" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<input maxlength="10" class="form-control" type="text" name="mobile" placeholder="Mobile number ( 10 digit )" value="<?php if(!empty($_POST['mobile'])){ echo $_POST['mobile']; } ?>">
										</div>
										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<div class="dropdown">
												<select name="type" class="form-control">
													<option hidden><strong>Type</strong></option>
										        	<option value="customer" <?php if(isset($_POST['type']) && $_POST['type'] == 'customer')
										        	{ echo "selected"; } 
										        	?>>
										      	    Customer
										      		</option>
										        	<option value="seller" <?php if(isset($_POST['type']) && $_POST['type'] == 
										          	'seller'){ echo "selected"; } ?>>
										      		Seller
										  			</option>
										        </select>
											</div>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-12 col-md-8 col-sm-12">
											<input class="form-control" type="password" name="pass" placeholder="Password ( Atleast 6 characters )">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-12 col-md-8 col-sm-12">
											<input class="form-control" type="password" name="cpass" placeholder="Confirm Password">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<?php
												include "captcha.php";
											?>
										</div>

										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<input class="form-control" type="text" name="captcha" placeholder="Enter captcha">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<input class="btn btn-block btn-success" type="submit" name="submit" value="Register">
										</div>
										<div class="col-lg-6 col-md-4 col-sm-6 form-group">
											<input  class="btn btn-block btn-danger" type="submit" name="cancel" value="Cancel">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>	
	<?php
		include "footer.php";
	?>  		
	</body>
</html>
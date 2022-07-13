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

			// Checking for submission.
			if(isset($_POST['submit']) && !empty($_POST['submit'])){
				
				// Validating CSRF token.
				if( $_SESSION['token'] == $_POST['csrf']){

					// Checking for empty credentials.
					if(!empty($_POST['email']) && !empty($_POST['password'])){
						
						// Checking for captcha validity.
						if(isset($_POST['captcha']) && ($_POST['captcha'] == $_SESSION['captcha'])){
							
							// Validating email.
							if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
								$email = $_POST['email'];
								
								// Validating password.
								if(preg_match('/^[a-zA-Z0-9]{6,30}$/', $_POST['password'])){
									$password = sha1($_POST['password']);
									
									// Checking user type.
									if($_POST['type'] == 'customer' || $_POST['type'] == 'seller'){
										$type = $_POST['type'];
										
										if( $type == 'customer' ){
											$query = "SELECT uid FROM user WHERE email = '$email' AND password = '$password'";
										}else if ( $type == 'seller'){
											$query = "SELECT sid FROM seller WHERE email = '$email' AND password = '$password'";
										}

										// Checking for results, number of rows and fectched data.
										if($result = mysqli_query($conn, $query)){
											if($rows = mysqli_num_rows($result) == 1){
												if($col = mysqli_fetch_array($result)){
													
													
													// Assigning session variables.
													$_SESSION['id'] = $col[0];
													
													echo $_SESSION['id'];

													// Redireting to respective profile pages.
													if($type == 'customer'){
														$_SESSION['utype'] = 'customer';
														header('Location: ./products.php');
													}else if($type == 'seller'){
														$_SESSION['utype'] = 'seller';
														header('Location: ./seller.php');
													}
												}
											}else{
											//	echo "<div class='alert alert-danger'>Invalid credentials or User type.</div>";
												loginerror(1);
											}
										}
									}else{
										echo "<div class='alert alert-danger'>Invalid user type.</div>";
									}
								}else{
									echo "<div class='alert alert-danger'>Invalid characters in password.</div>";
								}
							}else{
								echo"<div class='alert alert-danger'>Invalid email.</div>";
							}
						}else{
							echo"<div class='alert alert-danger'>Invalid captcha.</div>";
						}
					}else{
						echo "<div class='alert alert-danger'>Empty email or password.</div>";	
					}
				}
			}else{
				//echo "<div class='alert alert-danger'>Invalid submission.</div>";
			}
		?>
		<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3   col-xs-10 col-xs-offset-1" >
							<form action="" method="POST">
								<input type="hidden" name="csrf" value="<?php echo gencsrftoken(); ?>">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<h2>Login</h2>
										</div>
									</div>
									<br>
									<div class="row form-group">
										<div class="col-lg-12 col-sm-12 col-md-12 ">
											<input class="form-control" type="text" name="email" placeholder="Email Id">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-sm-6 col-md-6  form-group">
											<input class="form-control" type="password" name="password" placeholder="Password">
										</div>
										<div class="col-lg-6 col-sm-6 col-md-6  form-group">
											<div class="dropdown">
												<select name="type" class="form-control">
										        	<option hidden>Type</option>
										        	<option value="customer">Customer</option>
										        	<option value="seller">Seller</option>
										        </select>
											</div>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-6 form-group">
											<?php
												include "captcha.php";
											?>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 form-group">
											<input class="form-control" type="text" name="captcha" placeholder="Enter captcha">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 form-group">
											<input class="btn btn-block btn-success" type="submit" name="submit" value="Login">
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6   form-group">
											<input class="btn btn-block btn-danger" type="submit" name="submit" value="Cancel">
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
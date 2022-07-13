<?php

	// CSRF token generator.
	function gencsrftoken(){
		$token = "0";
		for($i=0; $i<=20; $i++){
			$token = $token.rand(0,9);
		}

		$_SESSION['token'] = $token;
		return $token;
	}

	// Checking for first time registration and displaying alert.
	function firsttime(){
		if(isset($_SESSION['registered']) && $_SESSION['registered'] == 1){
			echo '<div class="container">
					<div class="row">
						<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 col-lg-3 col-md-4 col-sm-5 col-xs-10">
							<div class="alert alert-success alert-dismissible fade in">
    							<strong>
    								Registration Successful!
    							</strong>
    							<span class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="close">
    							</span>
    						</div>
    					</div>
    				</div>
				</div>';
			$_SESSION['registered'] = 0;	// Don't need success message next time.
		}
	}

	// Checking for login errors.
	function loginerror($n){
	echo '<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-0 ">
					<div class="alert alert-danger alert-dismissible">
						<strong>';
						switch($n){
							case 1:
								echo "Invalid credentials or User type.";
						}	
	echo 				'</strong>
						<span class="glyphicon glyphicon-remove" data-dismiss="alert">
						</span>
					</div>
				</div>
			</div>
		</div>';
	}

	// Verification error for seller.
	function verifyerror(){
		echo '<div class="container">
		<div class="row">
			<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 col-lg-3 col-md-4 col-sm-5 col-xs-10">
				<div class="alert alert-danger alert-dismissible fade in">
					<strong>
						Seller verification pending!
					</strong>
					<span class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="close">
					</span>
				</div>
				</div>
			</div>
		</div>';
	}

	// Checking if user is logged in and as seller.
	function isseller(){
	    if(isset($_SESSION['utype']) && $_SESSION['utype'] == 'seller'){
	    	return TRUE;
		}else{
		   	return FALSE;
		}
	}

	function iscustomer(){
	    if(isset($_SESSION['utype']) && $_SESSION['utype'] == 'customer'){
	    	return TRUE;
		}else{
		   	return FALSE;
		}
	}

	function getuserdata($conn){

    	if(isset($_SESSION['utype']) && $_SESSION['utype'] == 'customer'){
    	
            // Customer has logged in.
            $id = $_SESSION['id'];
            $utype = $_SESSION['utype'];
            
            // Querying user id and type with correct credentials and type.
            $query = "SELECT * FROM user WHERE uid = '$id'";

            // Checking for results, number of rows and fectched data.
            if($result = mysqli_query($conn, $query)){
                if($rows = mysqli_num_rows($result) == 1){
                    if($col = mysqli_fetch_array($result)){
                        
                        // Assigning session variables.
                        $_SESSION['name'] = $col['fname']." ".$col['lname'];
                        $_SESSION['email'] = $col['email'];
                        $_SESSION['mobile'] = $col['mobile'];
                        $_SESSION['address'] = $col['address'];
                        $_SESSION['city'] = $col['city'];
                        $_SESSION['state'] = $col['state'];
                        $_SESSION['pincode'] = $col['pincode'];

                	}
            	}
        	}
    	}
	}

function getsellerdata($conn){

    	if(isset($_SESSION['utype']) && $_SESSION['utype'] == 'seller'){
    	
            // Customer has logged in.
            $id = $_SESSION['id'];
            $utype = $_SESSION['utype'];
            
            // Querying user id and type with correct credentials and type.
            $query = "SELECT * FROM seller WHERE sid = '$id'";

            // Checking for results, number of rows and fectched data.
            if($result = mysqli_query($conn, $query)){
                if($rows = mysqli_num_rows($result) == 1){
                    if($col = mysqli_fetch_array($result)){
                        
                        // Assigning session variables.
                        $_SESSION['name'] = $col['fname']." ".$col['lname'];
                        $_SESSION['email'] = $col['email'];
                        $_SESSION['mobile'] = $col['mobile'];
                        $_SESSION['address'] = $col['address'];
                        $_SESSION['city'] = $col['city'];
                        $_SESSION['state'] = $col['state'];
                        $_SESSION['pincode'] = $col['pincode'];
                        $_SESSION['verify'] = $col['verify'];
                        $_SESSION['pan'] = $col['pan'];

                	}
            	}
        	}
    	}
	}
	function msg_success($msg){
		echo '<div class="container">
					<div class="row">
						<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 col-lg-3 col-md-4 col-sm-5 col-xs-10">
							<div class="alert alert-success alert-dismissible fade in">
    							<strong>
    								'.$msg.'
    							</strong>
    							<span class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="close">
    							</span>
    						</div>
    					</div>
    				</div>
				</div>';
	}

	function msg_fail($msg){
	echo '<div class="container">
				<div class="row">
					<div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 col-lg-3 col-md-4 col-sm-5 col-xs-10">
						<div class="alert alert-danger alert-dismissible fade in">
							<strong>
								'.$msg.'
							</strong>
							<span class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="close">
							</span>
						</div>
					</div>
				</div>
			</div>';
	}
?>
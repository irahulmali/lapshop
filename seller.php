<?php
    include "conn.php";
    
    if(isseller()){
        //header('Location: ./seller.php');
    }else if(iscustomer()){
        header('Location: ./products.php');
    }else{
        header('Location: ./');
    }

    // Checking if user is logged in and as seller.
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

	    // Seller has logged in.
	    $id = $_SESSION['id'];
	    
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
	                $_SESSION['verify'] = $col['verify'];

	                if($_SESSION['verify'] == 0){
	                	header('Location: ./seller_account_settings.php');
	                }
	            }
	        }
	    }
	}else{
	    header('Location: ./');
	}
    
?>
<html>
    <head>
        <?php
            include "all.php";
        ?>
    </head>
    <body>
        <?php
            include "nav_seller.php";
        ?>
        <?php
        // Showing success message for first time registration.
			firsttime();	// Checking done in this function in udf.php
        ?>
        <?php
            include "footer.php";
        ?>  
    </body>
</html>
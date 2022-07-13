<?php
	include "conn.php";
	
	if(isseller()){
        header('Location: ./seller.php');
    }else if(iscustomer()){
        getuserdata($conn);		
        //header('Location: ./products.php');
    }else{
        //header('Location: ./products.php');
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
			if(iscustomer()){
				include "nav_user.php";				
			}else{
				include "nav.php";
			}

		?>
		<?php
			// Showing success message for first time registration.
			firsttime();	
		?>
		
		<?php

            if(isset($_GET['q']) && !empty($_GET['q'])){

            	$q = mysqli_real_escape_string($conn, $_GET['q']);

            	// Searching using regular expression.
            	$query = "SELECT * FROM products WHERE description REGEXP '$q'";

            }else{

            	// Selecting all products.
	            $query = "SELECT * FROM products";

            }


            if($result = mysqli_query($conn, $query)){
                if($rows = mysqli_num_rows($result) >=1){
                    // Query has executed.
                }
            }else{
            	//header('Location: ./products.php');
            }

        ?>
        <br><br>
        <div class=" container ">
            <div class=" row">
             <?php
             if($result){
                while($col = mysqli_fetch_array($result)){
                
               // <!-- Whole content. This will be repeated. -->
	            echo  '<div class="col-lg-4">
		            		<form action="./cart.php" method="GET">
		            			<input type="hidden" value="'.$col['pid'].'" name="item">
			                    <div class="panel panel-primary">
			                    	<div class="panel-heading">
										<h4>'.$col['brand']." ".$col['model'].'</h4>
			                    	</div>
			                    	<div class="panel-body">
			                            <img class="img img-res" src="./images/products/'.$col['img'].'">
			                    	</div>
			                    	<div class="panel-footer">
			                    		<h3>Rs. '.$col['price'].'</h3>	
				                       	<input type="submit" class="btn btn-primary" name="action" value="Add to cart">
				                       	<a href="./details.php?item='.$col['pid'].'" target="_blank" class="btn btn-warning pull-right">
					                       Check details
					                    </a>
			                    	</div>
			                    </div>
			                </form>
	                	</div>';
            
                }
            }
            ?>
                <!-- It all ends here. -->  
            </div>
        </div>
		<?php
			include "footer.php";
		?>  
	</body>
</html>
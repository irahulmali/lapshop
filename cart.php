<?php
    include 'conn.php';
    
    if(isseller()){
        header('Location: ./seller.php');
    }else if(iscustomer()){
        getuserdata($conn);
             
        //header('Location: ./products.php');
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
        	// Getting selected cart item in session.
        	if(isset($_GET['action']) && !empty($_GET['action'])){

        		if($_GET['action'] == "Add to cart"){
        			//Add to cart.
        			$_SESSION['items'] = $_GET['item']."_".$_SESSION['items'];
        			$items = explode("_", $_SESSION['items']);	
	    	    	$items = array_unique($items); // Array for unique selection.
	    	    	array_pop($items);
        		}

        		if($_GET['action'] == "Remove from cart"){
        			// Removing from cart.
        			$items = explode("_", $_SESSION['items']);
        			$items = array_unique($items);
        			foreach (array_keys($items, $_GET['item']) as $key) {
					    unset($items[$key]);
					}

					$_SESSION['items'] = implode("_", $items);
        		}
        	}
        	
        	if($_SESSION['items'] == ""){
        		$items = array();
        		$_SESSION['ic'] = 0;	
        	}else{
	        	$items = explode("_", $_SESSION['items']);	
   		    	$items = array_unique($items); // Array for unique selection.
        		array_pop($items);
        		$_SESSION['ic'] = count($items);        		
        	}

            include "nav_user.php";
	        
	        if($_SESSION['ic'] > 0){    
	            echo '<div class="container">
						<div class="row">
							<form action="./checkout.php" method="POST">
								<input type="submit" value="Checkout" name="checkout" class="btn btn-success btn-lg pull-right">
							</form>
						</div>
					</div>';          
        	}else{
        		if(empty($_SESSION['items'])){
	            	echo "<div class='alert alert-danger'><h3>Cart is empty. Please add items first.</h3></div>";	
        		}
            }
        ?>
        
		<br>
        <div class="container">
        	<div class="row">
        		<?php
                
        			foreach ($items as $key => $value) {
            			$pid = $items[$key];

            			$query = "SELECT * FROM products WHERE pid = $pid";

			            if($result = mysqli_query($conn, $query)){
			                if($rows = mysqli_num_rows($result) >=1){
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
							                       	<input type="submit" class="btn btn-danger" value="Remove from cart" name="action">
						                    	</div>
						                    </div>
						                </form>
				                	</div>';
                				}
			                }
			            }
            		}
                
        		?>
        	</div>
        </div>
        <?php
            include "footer.php";
        ?>  
    </body>
</html>
<?php
    include "conn.php";
    include "s.php";
    
    if(isseller()){
        header('Location: ./seller.php');
    }else if(iscustomer()){
        header('Location: ./products.php');
    }else{
        //header('Location: ./');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include "all.php";
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <?php
                    include "nav.php";
                ?>
            </div>
            <div class="row">
            	<div class="container-fluid">
            		<div class="row">
		        		<div class="col-lg-offset-1 col-lg-4">
			        		<img class="offer img-rounded img-responsive img-thumbnail" src="images/laptop_offer.jpg">
		        		</div>
		        		<div class="col-lg-offset-2 col-lg-4">
			        		<img class="offer img-rounded img-responsive img-thumbnail" src="images/mobile_offer.jpg">
		        		</div>
            		</div>
            	</div>

        		<div class="container-fluid">
            		<div class="row">
		        		<div class="col-lg-offset-5 col-lg-2">
		        			<a style="text-decoration: none;" href="products.php">
		        				<button class="shopnow btn-primary btn-lg btn-block">
		        					Shop Now
		        				</button>
		        			</a>
		        		</div>
            		</div>
            	</div>

        		<div class="container-fluid">
            		<div class="row">
            			<div class="col-lg-offset-1 col-lg-4">
			        		<img class="offer img-rounded img-responsive img-thumbnail" src="images/storage_offer.jpg">
		        		</div>
		        		<div class="col-lg-offset-2 col-lg-4">
			        		<img class="offer img-rounded img-responsive img-thumbnail" src="images/tablet_offer.jpg">
		        		</div>
            		</div>
            	</div>
            </div>
        </div>

        <?php
			include "footer.php";
		?>          
    </body>
</html>
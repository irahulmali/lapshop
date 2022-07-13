<?php
	include "conn.php";
    
    if(isseller()){
        // Do nothing. 
    }elseif(iscustomer()){  
        header('Location: ./products.php');
    }else{
        header('Location: ./');
    }
    

    if($_SESSION['verify'] == 0){
        header('Location: ./seller_account_settings.php');
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
            $sid = $_SESSION['id'];
            $query = "SELECT * FROM products WHERE sid = $sid";

            if($result = mysqli_query($conn, $query)){
                if($rows = mysqli_num_rows($result) >=1){
                    
                }
            }

        ?>
        <div class=" container ">
            <div class=" row">
             <?php   
                while($col = mysqli_fetch_array($result)){
                
               // <!-- Whole content. This will be repeated. -->
            echo  '<div class="col-lg-4">
                            <form action="./cart.php" method="GET" target="_blank">
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
                                        <input type="submit" class="btn btn-primary" value="Add to cart">
                                        <a href="./details.php?item='.$col['pid'].'" target="_blank" class="btn btn-warning pull-right">
                                           Check details
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>';
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
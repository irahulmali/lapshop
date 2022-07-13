<?php
    session_start();
    
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "lapshop";
    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn ){
        die('Could not connect: ' . mysqli_error());
    }

    include "udf.php";
    
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
            include "nav_user.php";
        ?>
        <div class="container">
            <div class="row">
                <h3 class="alert alert-success"> Your orders </h3>
            </div>
            <div class="row">
                <h3>
                    <div class="col-lg-5 col-lg-offset-1">
                        Item description
                    </div>
                    <div class="col-lg-2">
                        Item price
                    </div>
                    <div class="col-lg-2">
                        Order timestamp
                    </div>
                    <div class="col-lg-2">
                        Seller & Delivery status
                    </div>
                </h3>
            </div><hr>
        <?php
            $query = "SELECT products.img, products.description, products.price, products.seller,orders.orderdate, orders.delivery FROM products INNER JOIN orders ON products.pid = orders.pid AND orders.uid = ".$_SESSION['id']."";
            //echo $query;

            if($result = mysqli_query($conn, $query)){
                if($rows = mysqli_num_rows($result) >=1){
                    while($col = mysqli_fetch_array($result)){
                       echo '<div class="row">
                                <div class="col-lg-3">
                                    <img class="img img-responsive" src="./images/products/'.$col['img'].'">
                                </div>
                                <div class="col-lg-3">
                                    <h4>'.$col['description'].'</h4>
                                </div>
                                <div class="col-lg-2">
                                    <h4>Rs. '.$col['price'].'/-</h4>
                                </div>
                                <div class="col-lg-2">
                                    <h4>'.$col['orderdate'].'</h4>
                                </div>
                                <div class="col-lg-2">
                                    <h4>Sold by '.$col['seller'].'</h4>
                                    <h4>Order is '.$col['delivery'].'</h4>
                                </div>
                            </div><hr>';                 
                    }
                }
            }
        ?>
    </div>
    </body>
</html>
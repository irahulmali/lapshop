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
        <?php
            if(isset($_POST['checkout']) && !empty($_POST['checkout']) && !empty($_SESSION['items'])){

                $items = explode("_", $_SESSION['items']);  
                $items = array_unique($items); // Array for unique selection.
                array_pop($items);

            }else{
                header('Location: ./cart.php');
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-4">
                    <div class="alert alert-success alert-dismissible fade in">
                        <h4>Your order has been placed.
                            <span class="glyphicon glyphicon-remove" data-dismiss="alert" aria-label="close"></span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
            <?php
            $total = 0;
                foreach ($items as $key => $value) {

                    $pid = $items[$key];
                    $query = "SELECT * FROM products WHERE pid = $pid";



                    if($result = mysqli_query($conn, $query)){
                        if($rows = mysqli_num_rows($result) >=1){
                            while($col = mysqli_fetch_array($result)){
                                    $total = $total + $col['price'];
                                    
                                    
                                    $uid = $_SESSION['id'];
                                    $pid = $pid;
                                    $sid = $col['sid'];
                                    $orderdate = date("Y-m-d H:i:s");
                                    $delivery = 'delivered';

                                    $q = "INSERT INTO orders(uid, pid, sid, orderdate, delivery) VALUES($uid,$pid,$sid,'$orderdate','$delivery')";

                                    if(mysqli_query($conn, $q)){
                                        echo ' <div class="row">
                                                <div class="col-lg-4">
                                                    <img class="img img-res" src="./images/products/'.$col['img'].'">
                                                </div>
                                                <div class="col-lg-4">
                                                    <h3>'.$col['description'].'</h3>
                                                </div>
                                                <div class="col-lg-1">
                                                    <h3>1 unit</h3>
                                                </div>
                                                <div class="col-lg-3">
                                                    <h3>Rs. '.$col['price'].'/-</h3>
                                                </div>
                                            </div><hr>';
                                            $_SESSION['items'] = "";
                                            $_SESSION['ic'] = 0;
                                    }else{
                                        // Error placing order.
                                    }
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-8">
                        <h3> 
                            <div class='alert alert-success'>
                                Total: Rs. <?php echo $total; ?>/-
                            </div>
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-8">
                        <a href="./products.php" class="btn btn-success btn-block pull-right">
                            <h4>Shop again.</h4>
                        </a>
                    </div>
                </div>
        </div>
        
        <?php
            include "footer.php";
        ?>  
    </body>
</html>
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
            include "nav_user.php";
        ?>
        <?php
            if(isset($_GET['item']) && is_numeric($_GET['item'])){
                
                $item = $_GET['item'];

                $query = "SELECT * FROM products WHERE pid = $item";

                if($result = mysqli_query($conn, $query)){
                    if($rows = mysqli_num_rows($result) >=1){

                        $col = mysqli_fetch_array($result);

                    }
                }
            }else{
                header('Location: ./products.php');
            }
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?php
                        echo '<img class="img img-responsive" src="./images/products/'.$col['img'].'">';
                    ?>
                </div>
                <div class="col-lg-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo "<h3>".$col['description']."</h3>"; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Brand</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['brand']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Model</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['model']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Price</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>Rs. ".$col['price']."/-</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Processor</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['processor']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Operating System</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['os']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Display</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['display']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>RAM</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['ram']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>HDD Storage</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['hdd']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Dimensions</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['dimensions']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Battery</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['battery']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Graphics</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['graphics']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Webcam</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['webcam']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Connectivity</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['connectivity']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Weight</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['weight']."</h4>"; ?>
                            </div>           
                        </div>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <h4><b>Warranty</b></h4>
                            </div>
                            <div class="col-lg-7 col-lg-offset-1">
                                <?php echo "<h4>".$col['warranty']."</h4>"; ?>
                            </div>           
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3 ">
                                <form action="./cart.php" method="" target="_blank">
                                    <input type="hidden" name="item" value="<?php echo $col['pid'];?>">
                                    <input type="submit" class="btn btn-primary btn-block" value="Add to cart">
                                </form>
                            </div>
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
<?php
    include "conn.php";
    
    if(isseller()){
        //header('Location: ./seller.php');
    }else if(iscustomer()){
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
            

            if(isset($_POST['submit']) && !empty($_POST['submit'])){
                    if($_POST['submit'] == 'Reset'){
                        header('Location: ./add.php');
                    }
                    if(preg_match($string50, $_POST['brand'])){
                        $brand = mysqli_real_escape_string($conn,$_POST['brand']);
                        
                        if(preg_match($string50, $_POST['model'])){
                            $model = mysqli_real_escape_string($conn,$_POST['model']);
                        
                            if(preg_match($num6, $_POST['price'])){
                                $price = mysqli_real_escape_string($conn,$_POST['price']);
                                
                                if(preg_match($num1, $_POST['quantity'])){
                                    $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
                                    
                                    if(preg_match($string200, $_POST['description'])){
                                        $description = mysqli_real_escape_string($conn,$_POST['description']);
                                        
                                        if(preg_match($string50, $_POST['processor'])){
                                            $processor = mysqli_real_escape_string($conn,$_POST['processor']);
                                        
                                            if(preg_match($string50, $_POST['os'])){
                                                $os = mysqli_real_escape_string($conn,$_POST['os']);
                                        
                                                if(preg_match($string50, $_POST['ram'])){
                                                        $ram = mysqli_real_escape_string($conn,$_POST['ram']);
                                                        
                                                        if(preg_match($string50, $_POST['hdd'])){
                                                                $hdd = mysqli_real_escape_string($conn,$_POST['hdd']);

                                                            if(preg_match($string50, $_POST['battery'])){
                                                                $battery = mysqli_real_escape_string($conn,$_POST['battery']);

                                                                    if(preg_match($string100, $_POST['connectivity'])){
                                                                $connectivity = mysqli_real_escape_string($conn,$_POST['connectivity']);

                                                                    if(preg_match($string100, $_POST['display'])){
                                                                $display = mysqli_real_escape_string($conn,$_POST['display']);

                                                                    if(preg_match($string50, $_POST['graphics'])){
                                                                $graphics = mysqli_real_escape_string($conn,$_POST['graphics']);

                                                                    if(preg_match($string50, $_POST['dimensions'])){
                                                                $dimensions = mysqli_real_escape_string($conn,$_POST['dimensions']);

                                                                    if(preg_match($string50, $_POST['warranty'])){
                                                                            $warranty = mysqli_real_escape_string($conn,$_POST['warranty']);

                                                                            if(preg_match($string50, $_POST['webcam'])){
                                                                            $webcam = mysqli_real_escape_string($conn,$_POST['webcam']);

                                                                                if(preg_match($string50, $_POST['weight'])){
                                                                                    $weight = mysqli_real_escape_string($conn,$_POST['weight']);

                                                                                    include "imgupload.php";                    
                                                                                }else{
                                                                                    echo "<div class='alert alert-danger'>Invalid characters in weight.</div>";
                                                                                }
                                                                            }else{
                                                                                echo "<div class='alert alert-danger'>Invalid characters in webcam.</div>";
                                                                            }
                                                                        }else{
                                                                            echo "<div class='alert alert-danger'>Invalid characters in warranty.</div>";
                                                                        }

                                                                }else{
                                                                    echo "<div class='alert alert-danger'>Invalid characters in dimensions.</div>";
                                                                }

                                                                }else{
                                                                    echo "<div class='alert alert-danger'>Invalid characters in graphics.</div>";
                                                                }

                                                                }else{
                                                                    echo "<div class='alert alert-danger'>Invalid characters in display.</div>";
                                                                }
                                                                }else{
                                                                    echo "<div class='alert alert-danger'>Invalid characters in connectivity.</div>";
                                                                }
                                                                }else{
                                                                    echo "<div class='alert alert-danger'>Invalid characters in battery.</div>";
                                                                }
                                                            }else{
                                                                echo "<div class='alert alert-danger'>Invalid characters in HDD.</div>";
                                                            }
                                                    }else{
                                                        echo "<div class='alert alert-danger'>Invalid characters in RAM.</div>";
                                                    }
                                            }else{
                                                echo "<div class='alert alert-danger'>Invalid characters in OS.</div>";
                                            }
                                        }else{
                                            echo "<div class='alert alert-danger'>Invalid characters in processor.</div>";
                                        }
                                    }else{
                                        echo "<div class='alert alert-danger'>Invalid characters in description.</div>";
                                    }
                                }else{
                                    echo "<div class='alert alert-danger'>Invalid characters in quantity.</div>";
                                }
                            }else{
                                echo "<div class='alert alert-danger'>Invalid characters in price.</div>";
                            }
                        }else{
                            echo "<div class='alert alert-danger'>Invalid characters in model.</div>";
                        }
                    }else{
                        echo "<div class='alert alert-danger'>Invalid characters in brand.</div>";
                    }
                }
        ?>
        <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1  ">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="csrf" value="<?php echo gencsrftoken(); ?>">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <h2>Add New Item</h2>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row form-group">
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="brand" placeholder="Brand" value="<?php if(!empty($_POST['brand'])){ echo $_POST['brand']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="model" placeholder="Model" value="<?php if(!empty($_POST['model'])){ echo $_POST['model']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="processor" placeholder="Processor" value="<?php if(!empty($_POST['processor'])){ echo $_POST['processor']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="os" placeholder="Operating System" value="<?php if(!empty($_POST['os'])){ echo $_POST['os']; } ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="description" maxlength="200" placeholder="Description of device specs" value="<?php if(!empty($_POST['description'])){ echo $_POST['description']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 form-group">
                                            <input maxlength="6" class="form-control" type="text" name="price" placeholder="Price" value="<?php if(!empty($_POST['price'])){ echo $_POST['price']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="quantity" placeholder="Quantity" value="<?php if(!empty($_POST['quantity'])){ echo $_POST['quantity']; } ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">  
                                        <div class="col-lg-2 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="ram" placeholder="RAM" value="<?php if(!empty($_POST['ram'])){ echo $_POST['ram']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 form-group">
                                            <input maxlength="50" class="form-control" type="text" name="hdd" placeholder="Storage" value="<?php if(!empty($_POST['hdd'])){ echo $_POST['hdd']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="battery" maxlength="50" placeholder="Battery" value="<?php if(!empty($_POST['battery'])){ echo $_POST['battery']; } ?>">
                                        </div>
                                        
                                        <div class="col-lg-2 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="webcam" maxlength="50" placeholder="Webcam" value="<?php if(!empty($_POST['webcam'])){ echo $_POST['webcam']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="weight" maxlength="50" placeholder="Weight" value="<?php if(!empty($_POST['weight'])){ echo $_POST['weight']; } ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="warranty" maxlength="50" placeholder="Warranty" value="<?php if(!empty($_POST['warranty'])){ echo $_POST['warranty']; } ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        
                                        <div class="col-lg-3 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="display" maxlength="100" placeholder="Display specs" value="<?php if(!empty($_POST['display'])){ echo $_POST['display']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="graphics" maxlength="50" placeholder="Graphics" value="<?php if(!empty($_POST['graphics'])){ echo $_POST['graphics']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="dimensions" maxlength="50" placeholder="Dimensions" value="<?php if(!empty($_POST['dimensions'])){ echo $_POST['dimensions']; } ?>">
                                        </div>
                                        <div class="col-lg-3 col-md-8 col-sm-12">
                                            <input class="form-control" type="text" name="connectivity" maxlength="100" placeholder="Connectivity" value="<?php if(!empty($_POST['connectivity'])){ echo $_POST['connectivity']; } ?>">
                                        </div>
                                    </div>                 
                                    <br><br>           
                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-4 col-sm-6 form-group">
                                            <input type="file" name="image" class="btn btn-info btn-block">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input  class="btn btn-block btn-danger" type="submit" name="submit" value="Reset">
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                            <input class="btn btn-block btn-success" type="submit" name="submit" value="Submit">
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
<?php
    include "conn.php";

    if(isseller()){
        getsellerdata($conn);
        //header('Location: ./seller.php');
    }else if(iscustomer()){
        getuserdata($conn);     
        header('Location: ./products.php');
    }else{
        header('Location: ./products.php');
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
            if($_SESSION['verify'] == 0){
                verifyerror();
            }
        ?>
        <?php
            if(isset($_POST['csrf']) && $_SESSION['token'] == $_POST['csrf']){
                
                if(isset($_POST['submitAdd']) && !empty($_POST['submitAdd'])){

                    $address = mysqli_real_escape_string($conn, $_POST['address']);
                    $city = mysqli_real_escape_string($conn, $_POST['city']);
                    $state = mysqli_real_escape_string($conn, $_POST['state']);
                    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

                    $query = "UPDATE seller 
                                SET address = '$address', city = '$city', state = '$state', pincode = $pincode 
                                WHERE sid = ".$_SESSION['id'];

                    if(mysqli_query($conn, $query)){
                        msg_success('Address updated.');
                    }else{
                        msg_fail('Failed to update address.');
                    }

                }elseif (isset($_POST['submitPass']) && !empty($_POST['submitPass'])) {
                    if(preg_match($pass30, $_POST['cpass']) && preg_match($pass30, $_POST['npass']) && preg_match($pass30, $_POST['npass1'])){
                        if($_POST['npass'] == $_POST['npass1']){

                            $cpass = sha1($_POST['cpass']);
                            $npass = sha1($_POST['npass']);

                            $query = "SELECT sid FROM seller WHERE password = '".$cpass."' AND sid = ".$_SESSION['id'].""; 

                            $result = mysqli_query($conn, $query);
                            $rows = mysqli_num_rows($result);
                                                
                            if($rows == 1){
                                $query = "UPDATE seller SET password = '".$npass."' WHERE sid = ".$_SESSION['id']."";
                                $result = mysqli_query($conn, $query);
                                
                                if($result){
                                    msg_success('Password updated.');
                                }
                            }else{
                                msg_fail('Wrong password.');
                            }

                        }else{
                            msg_fail('Repeat same password.');
                        }
                    }else{
                        msg_fail('Invalid characters entered.');
                    }
                }elseif(isset($_POST['submitPAN']) && !empty($_POST['submitPAN'])){
                    if(preg_match($PAN, $_POST['pan'])){

                        $pan = $_POST['pan'];
                        
                        $query = "UPDATE seller SET verify = 1, pan = '".$pan."' WHERE sid = ".$_SESSION['id']."";
                        if(mysqli_query($conn, $query)){
                            msg_success('You are now verified seller.');
                        }else{
                            msg_fail('Verification failed. Try again.');
                        }

                    }else{
                        msg_fail('Format is AAAAA0000A.');
                    }
                }
            }
            //
        ?>
        <?php
             $csrf_token = gencsrftoken();
        ?>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#verify" data-toggle="tab"><h4>PAN Verification</h4></a></li>
                <li><a href="#address" data-toggle="tab"><h4>Address details</h4></a></li>
                <li><a href="#password" data-toggle="tab"><h4>Change password</h4></a></li>
            </ul>

            <div class="tab-content">
                <div id="verify" class="tab-pane fade in active">
                <br>
                <div class="container-fluid">
                    <form action="" method="POST">
                        <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>">
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <input type="text" name="pan" placeholder="Enter PAN card number. (AAAAA0000A)" class="form-control" maxlength="10" value="<?php
                                        if(!empty($_POST['pan'])){ 
                                            echo $_POST['pan']; 
                                        }else{
                                            echo $_SESSION['pan'];                      
                                        } 
                                     ?>">
                            </div>
                            <div class="col-lg-2 col-lg-offset-1 form-group">
                                <input type="submit" name="submitPAN" value="Submit" class="form-control btn btn-success" >
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
                <div id="address" class="tab-pane fade in">
                <br>
                    <div class="container-fluid">
                        <form action="" method="POST">
                            <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <textarea class="form-control" placeholder="Enter your address" name="address" rows="4" cols="50" length="200"><?php
                                            if(!empty($_POST['address'])){ 
                                                echo $_POST['address']; 
                                            }else{
                                                echo $_SESSION['address'];                       
                                            } 
                                         ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 form-group">
                                    <input type="text" name="city" placeholder="City" class="form-control" length="40" value="<?php
                                            if(!empty($_POST['city'])){ 
                                                echo $_POST['city']; 
                                            }else{
                                                echo $_SESSION['city'];                       
                                            } 
                                         ?>">
                                </div>   
                                <div class="col-lg-4 form-group">
                                    <input type="text" name="state" placeholder="State" class="form-control" length="40" value="<?php
                                            if(!empty($_POST['state'])){ 
                                                echo $_POST['state']; 
                                            }else{
                                                echo $_SESSION['state'];                       
                                            } 
                                         ?>">
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col-lg-2 form-group">
                                    <input type="text" name="pincode" placeholder="Pincode" class="form-control" length="6" value="<?php
                                            if(!empty($_POST['pincode'])){ 
                                                echo $_POST['pincode']; 
                                            }else{
                                                echo $_SESSION['pincode'];                       
                                            } 
                                         ?>">
                                </div>   
                                <div class="col-lg-2 col-lg-offset-2 form-group">
                                    <input type="submit" name="submitAdd" value="Submit" class="form-control btn btn-success" >
                                </div>   
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Change password. -->
                <div id="password" class="tab-pane fade in">
                    <br>
                    <div class="container-fluid">
                        <form action="" method="POST">
                            <input type="hidden" name="csrf" value="<?php echo $csrf_token; ?>">
                            <div class="row">
                                <div class="col-lg-5 form-group">
                                    <input type="password" name="cpass" placeholder="Enter current password." class="form-control" length="40">
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-lg-5 form-group">
                                    <input type="password" name="npass" placeholder="Enter new password." class="form-control" length="40">
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-lg-5 form-group">
                                    <input type="password" name="npass1" placeholder="Repeat new password." class="form-control" length="40">
                                </div>    
                            </div>   
                            <div class="col-lg-2 col-lg-offset-3 form-group">
                                <input type="submit" name="submitPass" value="Change password" class="form-control btn btn-success" >
                            </div>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include "footer.php";
        ?>  
    </body>
</html>
<?php
    include "conn.php";
    
    if(isseller()){
        header('Location: ./seller.php');
    }else if(iscustomer()){
        header('Location: ./products.php');
    }else{
        // Do nothing.
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
            include "nav.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> Live chat support</h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                Growth of a company depends on the way it serves it's customer. We at Lapshop.com treat customers with utmost gratitude, because it's because of them we are afloat. Our live chat support is best among the e-commerce platforms in the market. Out assistants are online 24x7 and are at your service to resolve your troubles.
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="./images/support.png" class="img img-res">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> Contact Us </h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <div class="container-fluid">
                                    <div class="row form-group">
                                        <div class="col-lg-10">
                                            <input class="form-control" type="text" name="username" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10 form-group">
                                            <input class="form-control" type="text" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10 form-group">
                                            <textarea class="form-control" name="query" placeholder="What question do you have ?" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-6">
                                            <input class="btn btn-block btn-success" type="submit" name="submit" value="Submit" onclick="alert('Your query has been submitted. We will get back to you soon.')">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Company Information:</h3>
                        </div>
                        <div class="panel-body">
                            <h4> Mumbai, India - 400001</h4><br>
                            <h4> Phone:  022 2262 0251</h4><br>
                            <h4> Email:  lap@shop.com</h4><br>
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
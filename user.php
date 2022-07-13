<?php
    include "conn.php";

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
        <!-- Everything goes here -->


        <?php
            include "footer.php";
        ?>  
    </body>
</html>
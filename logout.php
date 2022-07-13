<?php
    include "conn.php";
?>
<html>
    <head>
    </head>
    <body>
        <?php 
            session_destroy();
            header('Location: ./');
        ?>
    </body>
</html>
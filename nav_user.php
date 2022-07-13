<?php

echo '<nav class="navbar navbar-static-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="./products.php">
                <img class="logo  img-responsive img-rounded" src="images/logoc.png">
            </a>
        </div>
        <h4>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form" role="search" action="./products.php" method="GET">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            <button class="btn btn-default form-control" type="submit">
                            <span class="glyphicon glyphicon-search"></span></button>
                        </div>
                </form>  
                </li>
                <li><a >Hello ';if(isset($_SESSION['name'])){ echo $_SESSION['name']; }
                    echo '</a>
                </li>
                <li class="dropdown">
                    <a href="./products.php">Products</a>
                </li>
                <li>
                    <a href="./cart.php">Cart <span class="glyphicon glyphicon-shopping-cart"></span><span class="badge badge-notify">'.$_SESSION['ic'].'</span></a>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-cog"></span>
                    Settings</a>
                    <ul class="dropdown-menu">
                        <li><a href="./order_history.php"><h4>Order History</h4></a></li>
                        <li><a href="./user_account_settings.php"><h4>Account Settings</h4></a></li>
                        <li><a href="./logout.php"><h4><span class="glyphicon glyphicon-log-out"></span> Logout</h4></a></li>
                    </ul>

                </li>
            </ul> 
        </h4>
    </div>
</nav>';
?>
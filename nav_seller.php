<?php
echo '<nav class="navbar navbar-static-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="./seller.php">
                <img class="logo  img-responsive img-rounded" src="images/logoc.png">
            </a>
        </div>
        <h4>
            <ul class="nav navbar-nav navbar-right">
                
                <li><a >Hello ';if(isset($_SESSION['name'])){ echo $_SESSION['name']; }
                	echo '</a>
                </li>
                <li>
                    <a href="./add.php">
                        <span class="glyphicon glyphicon-plus"></span> Add Items
                    </a>
                </li>
                <li>
                    <a href="./inventory.php">
                        <span class="glyphicon glyphicon-th"></span> Inventory
                    </a>
                </li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-cog"></span>
                    Settings</a>
                    <ul class="dropdown-menu">
                        <li><a href="./seller_account_settings.php"><h4>Account Settings</h4></a></li>
                        <li><a href="./logout.php"><h4><span class="glyphicon glyphicon-log-out"></span> Logout</h4></a></li>
                    </ul>

                </li>
            </ul> 
        </h4>
    </div>
</nav>';
?>
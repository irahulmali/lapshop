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

    $string50   = '/^[-.\sa-zA-Z0-9()\'",x|\/]{1,50}$/';
    $string100  = '/^[-.\sa-zA-Z0-9()\'",x|\/]{1,100}$/';
    $string200  = '/^[-.\sa-zA-Z0-9()\'",x|\/]{1,200}$/';

    $num1 = '/^[1-9]$/';
    $num2 = '/^[1-9][0-9]$/';
    $num3 = '/^[1-9][0-9]{1,2}$/';
    $num6 = '/^[1-9][0-9]{3,7}$/';

    $pass30 = '/^[a-zA-Z0-9]{6,30}$/';

    $PAN	= '/^[A-Z]{5}[0-9]{4}[A-Z]$/';

	include "udf.php";
	//var_dump($conn);
?>
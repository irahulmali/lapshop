<?php
	$a = 0;
	$n = "";
	$t = 0;
	$c = array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	
	for($a=0; $a<4; $a++){
		$t = rand(0,35);
		$n = $n.$c[$t];
		echo "<img class='img-thumbnail img-responsive cap' src='./captcha_images/".$c[$t].".jpg'>";
	}

	$_SESSION['captcha'] = $n;
	//echo $n;
?>
<?php
	session_start();
	
	$num1 = rand(1,9);
	$num2 = rand(1,9);
	$total = $num1 + $num2;
	
	$math = "$num1"." + "."$num2"."=";
	
	$_SESSION["total"] = $total;
	
	$img = imagecreate(75, 38);
	
	$background = imagecolorallocate($img, 255, 255, 255);
	
	$text_color = imagecolorallocate($img, 33, 37, 41);
	
	$text = $math;
	
	$font = "arial.ttf";
	
	imagettftext($img, 16, 0, 0, 26, $text_color, $font, $text);
	
	header("Content-type: image/png");
	imagepng($img);
	
	imagecolorallocate($text_color);
	imagecolorallocate($background);
	imagedestroy($img);
?>
<?php
session_start();

// Generate Random Number Between 1 - 9
$num1=rand(1,9);
$num2=rand(1,9);
$total=$num1+$num2;

// Sets text display format
$display = $num1 . ' + ' . $num2 . ' =';

// To be accessed from the rating_landing.php page
$_SESSION["total"] = $total;

// Creates image of certain width and height
$img = imagecreate(75, 38);

// Background color
$background = imagecolorallocate($img, 255, 255, 255);

// Text color
$text_color = imagecolorallocate($img, 33, 37, 41);

$text = $display;

// Sets Text Font to use
// $_SERVER["DOCUMENT_ROOT"] sets the root folder as htdocs for easier portability
$font = $_SERVER["DOCUMENT_ROOT"]."/WebDevAssignment1/styles/verdana.ttf";

// Process of Creating Image
imagettftext($img, 16, 0, 0, 26, $text_color, $font, $text);

header('Content-type: image/png');
imagepng($img);

// Destroy Image Resource After use
imagecolorallocate($text_color);
imagecolorallocate($background);
imagedestroy($img);
?>
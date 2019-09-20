<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rating Summary</title>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
</head>

<body>
	<header>
		<?php
			include "header_content.php";
		?>
	</header>
	
	<article>
		<?php
			$fName = $_SESSION["fName"];
			$lName = $_SESSION["lName"];
			$regID = $_SESSION["regID"];
			$email = $_SESSION["email"];
			$regPay = $_GET["regPay"];
			$eventTime = $_GET["eventTime"];
			$route = $_GET["route"];
			$logic = $_GET["logic"];
			$security = $_GET["security"];
			
			echo "<p>First Name: ", $fName, "</p>";
			echo "<p>Last Name: ", $lName, "</p>";
			echo "<p>ID: ", $regID, "</p>";
			echo "<p>Email: ", $email, "</p>";
			echo "<p>Registration & Payment: ", $regPay, "</p>";
			echo "<p>Event Timing: ", $eventTime, "</p>";
			echo "<p>Race Route Selection: ", $route, "</p>";
			echo "<p>Logistic: ", $logic, "</p>";
			echo "<p>Security: ", $security, "</p";
		?>
		<p><input type="button" onclick="window.location.href='rating_landing.php'" value="OK"></p>
	</article>
	
	<footer>
	
	</footer>
</body>
</html>
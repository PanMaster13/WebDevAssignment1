<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rating Input</title>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
</head>

<body>
	<header>
		<?php
			include "header_content.php";
			echo "<p>Thank you ", $_GET["fName"], " ", $_GET["lName"], " (", $_GET["regID"], ") for participating in Kuching Marathon!</p>";
		?>
	</header>
	
	<article>
		
		<?php
		$_SESSION["fName"] = $_GET["fName"];
		$_SESSION["lName"] = $_GET["lName"];
		$_SESSION["regID"] = $_GET["regID"];
		$_SESSION["email"] = $_GET["email"];
		?>
		
		<form action="rating_summary.php" method="get">
		<p>Registration & Payment: 
			<input type="radio" name="regPay" value="1">Very Poor
			<input type="radio" name="regPay" value="2">Poor
			<input type="radio" name="regPay" value="3">Satisfactory
			<input type="radio" name="regPay" value="4">Good
			<input type="radio" name="regPay" value="5">Very Good
		</p>
		<p>Event Timing: 
			<input type="radio" name="eventTime" value="1">Very Poor
			<input type="radio" name="eventTime" value="2">Poor
			<input type="radio" name="eventTime" value="3">Satisfactory
			<input type="radio" name="eventTime" value="4">Good
			<input type="radio" name="eventTime" value="5">Very Good
		</p>
		<p>Race Route Selection: 
			<input type="radio" name="route" value="1">Very Poor
			<input type="radio" name="route" value="2">Poor
			<input type="radio" name="route" value="3">Satisfactory
			<input type="radio" name="route" value="4">Good
			<input type="radio" name="route" value="5">Very Good
		</p>
		<p>Logistic: 
			<input type="radio" name="logic" value="1">Very Poor
			<input type="radio" name="logic" value="2">Poor
			<input type="radio" name="logic" value="3">Satisfactory
			<input type="radio" name="logic" value="4">Good
			<input type="radio" name="logic" value="5">Very Good
		</p>
		<p>Security: 
			<input type="radio" name="security" value="1">Very Poor
			<input type="radio" name="security" value="2">Poor
			<input type="radio" name="security" value="3">Satisfactory
			<input type="radio" name="security" value="4">Good
			<input type="radio" name="security" value="5">Very Good
		</p>
		<p><input type="submit"></p>
		</form>
	</article>
	
	<footer>
	
	</footer>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rating Input</title>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
	<link rel="stylesheet" type="text/css" href="styles/styles.css" />
</head>

<body>
	<header>
		<?php
			include "header_content.php";
			echo "<p>Thank you ", $_SESSION["fName"], " ", $_SESSION["lName"], " (", $_SESSION["regID"], ") for participating in Kuching Marathon!</p>";
		?>
	</header>
	
	<article>
		<form id="Form" action="#" method="get" onsubmit="validateForm()">
		<p>Registration & Payment: 
			<input type="radio" id="1a" name="regPay" value="1">
			<label for="1a">Very Poor</label>
			
			<input type="radio" id="1b" name="regPay" value="2">
			<label for="1b">Poor</label>
			
			<input type="radio" id="1c" name="regPay" value="3">
			<label for="1c">Satisfactory</label>
			
			<input type="radio" id="1d" name="regPay" value="4">
			<label for="1d">Good</label>
			
			<input type="radio" id="1e" name="regPay" value="5">
			<label for="1e">Very Good</label>
		</p>
		<p>Event Timing: 
			<input type="radio" id="2a" name="eventTime" value="1">
			<label for="2a">Very Poor</label>
			
			<input type="radio" id="2b" name="eventTime" value="2">
			<label for="2b">Poor</label>
			
			<input type="radio" id="2c" name="eventTime" value="3">
			<label for="2c">Satisfactory</label>
			
			<input type="radio" id="2d" name="eventTime" value="4">
			<label for="2d">Good</label>
			
			<input type="radio" id="2e" name="eventTime" value="5">
			<label for="2e">Very Good</label>
		</p>
		<p>Race Route Selection: 
			<input type="radio" id="3a" name="route" value="1">
			<label for="3a">Very Poor</label>
			
			<input type="radio" id="3b" name="route" value="2">
			<label for="3b">Poor</label>
			
			<input type="radio" id="3c" name="route" value="3">
			<label for="3c">Satisfactory</label>
			
			<input type="radio" id="3d" name="route" value="4">
			<label for="3d">Good</label>
			
			<input type="radio" id="3e" name="route" value="5">
			<label for="3e">Very Good</label>
		</p>
		<p>Logistic: 
			<input type="radio" id="4a" name="logic" value="1">
			<label for="4a">Very Poor</label>
			
			<input type="radio" id="4b" name="logic" value="2">
			<label for="4b">Poor</label>
			
			<input type="radio" id="4c" name="logic" value="3">
			<label for="4c">Satisfactory</label>
			
			<input type="radio" id="4d" name="logic" value="4">
			<label for="4d">Good</label>
			
			<input type="radio" id="4e" name="logic" value="5">
			<label for="4e">Very Good</label>
		</p>
		<p>Security: 
			<input type="radio" id="5a" name="security" value="1">
			<label for="5a">Very Poor</label>
			
			<input type="radio" id="5b" name="security" value="2">
			<label for="5b">Poor</label>
			
			<input type="radio" id="5c" name="security" value="3">
			<label for="5c">Satisfactory</label>
			
			<input type="radio" id="5d" name="security" value="4">
			<label for="5d">Good</label>
			
			<input type="radio" id="5e" name="security" value="5">
			<label for="5e">Very Good</label>
		</p>
		<p><input type="submit" value="Next"></p>
		</form>
	</article>
	
	<footer>
		<p id="error_msg"> </p>
	</footer>
	
	
	<script src="scripts/validation.js"></script>
</body>
</html>
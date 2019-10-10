<!-- 	Student Name: Jason Ang Chia Wuen
		Student ID: 100087252
		Unit Name: Web Application Development
		Unit Code: COS30020
		Tutorial Group: 02 
-->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rating Summary</title>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
	<link rel="stylesheet" type="text/css" href="styles/styles.css" />
</head>

<body>
	<header>
		<?php
			include "header_content.php";
		?>
	</header>
	
	<article>
		<?php
			// Function to decided text value for Radio buttons
			function checkValue($getName)
			{
				$result = "";
				if ($_GET[$getName] == 1)
				{
					$result = "Very Poor";
				}
				else if ($_GET[$getName] == 2)
				{
					$result = "Poor";
				}
				else if ($_GET[$getName] == 3)
				{
					$result = "Satisfactory";
				}
				else if ($_GET[$getName] == 4)
				{
					$result = "Good";
				}
				else if ($_GET[$getName] == 5)
				{
					$result = "Very Good";
				}
				return $result;
			}
			
			// Setting values
			$fName = $_SESSION["fName"];
			$lName = $_SESSION["lName"];
			$regID = $_SESSION["regID"];
			$email = $_SESSION["email"];
			$regPay = checkValue("regPay");
			$eventTime = checkValue("eventTime");
			$route = checkValue("route");
			$logic = checkValue("logic");
			$security = checkValue("security");
			
			// Writing data to file section
			// fopen() opens the file while or die() prints error message if file has failed to be opened
			$fileName = "data/" . $regID . ".txt";
			$textFile = fopen($fileName, "w") or die("Failed to open data file.");
			
			// Setting text file data
			$dataText = "First name: $fName
Last name: $lName
Registration ID: $regID
Email address: $email
***Rating***
Registration and payment: $regPay
Event timing: $eventTime
Race route selection: $route
Logistic: $logic
Security: $security";
			
			// Writing into text file
			fwrite($textFile, $dataText);
			// Close file
			fclose($textFile);
			
			// Displaying data via PHP
			echo "
				<table>
					<tr>
						<th>First Name</th>
						<td>$fName</td>
					</tr>
					<tr>
						<th>Last Name</th>
						<td>$lName</td>
					</tr>
					<tr>
						<th>Registration ID</th>
						<td>$regID</td>
					</tr>
					<tr>
						<th>Email Address</th>
						<td>$email</td>
					</tr>
					<tr>
						<th>Registration & Payment</th>
						<td>$regPay</td>
					</tr>
					<tr>
						<th>Event Timing</th>
						<td>$eventTime</td>
					</tr>
					<tr>
						<th>Race Route Selection</th>
						<td>$route</td>
					</tr>
					<tr>
						<th>Logistic</th>
						<td>$logic</td>
					</tr>
					<tr>
						<th>Security</th>
						<td>$security</td>
					</tr>
				</table>
			";
		?>
		<p><input class="button" type="button" onclick="window.location.href='rating_landing.php'" value="OK"></p>
	</article>
	
	<footer>
	
	</footer>
</body>
</html>
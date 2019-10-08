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
	<title>Rating Landing</title>
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
	
	<?php
		if (isset($_GET["submit_button"]))
		{
			$message = "";
			$firstName = $_GET["fName"];
			$lastName = $_GET["lName"];
			$regID = $_GET["regID"];
			$email = $_GET["email"];
			$captcha = $_GET["captcha"];
			
			// Checking Registration ID Value
			if (empty($regID))
			{
				$message .= "Registration ID is required.<br/>";
			}
			else
			{
				$regID_array = explode('-', $regID);
				$finalValid = false;
				$valid1 = false;
				$valid2 = false;
				$valid3 = false;
				
				// Registration ID must be splitted into 3
				if (count($regID_array) == 3)
				{
					// Checking first value of registration ID
					if ($regID_array[0] == "KM")
					{
						$valid1 = true;
					}
					
					// Checking second value of registration ID
					if ($regID_array[1] == "10" or $regID_array[1] == "21" or $regID_array[1] == "42")
					{
						$valid2 = true;
					}
					
					// Checking third value of registration ID
					if (is_numeric($regID_array[2]))
					{
						$valid3 = true;
					}
					
					// Checking all 3 values of registration ID
					if ($valid1 == true and $valid2 == true and $valid3 == true)
					{
						$finalValid = true;
					}
				}
				
				// Sets error message if there is error
				if ($finalValid == false)
				{
					$message .= "Registration ID is incorrect.<br/>";
				}
			}
			
			// Checking Email Value
			if (empty($email))
			{
				$message .= "Email address is required.<br/>";
			}
			else
			{
				// Sets error message if there is error
				// FILTER_VALIDATE_EMAIL is a PHP built-in constant to vaildate email
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
				$message .= "Email address is incorrect.<br/>";
				}
			}
			
			// Checking Captcha Value
			if (empty($captcha))
			{
				$message .= "Captcha must be filled.<br/>";
			}
			else
			{
				if($captcha != $_SESSION["total"])
				{
					$message .= "Captcha is incorrect. Please try the captcha again.<br/>";
				}
			}
			
			// Only move to next page if error message is empty
			if($message == "")
			{
				$_SESSION["fName"] = $_GET["fName"];
				$_SESSION["lName"] = $_GET["lName"];
				$_SESSION["regID"] = $_GET["regID"];
				$_SESSION["email"] = $_GET["email"];
				header("Location: rating_input.php");
			}
		}
		else
		{
			$message = "";
		}
	?>
	
	<article>
		<form id="landingForm" action="rating_landing.php" method="get">
		<p>First Name*: <input type="text" name="fName" required="required"/></p>
		<p>Last Name*: <input type="text" name="lName" required="required"/></p>
		<p>Registration ID*: <input type="text" name="regID" placeholder="KM-xx-yyyy"/></p>
		<p>Email address*: <input type="text" name="email"/></p>
		
		<p>Please enter the answer for the captcha below:</p>
		<!-- Gets image from captcha.php file -->
		<p><img src="captcha.php" /></p>
		<p><input type="text" name="captcha" /></p>
		
		<p><input class="button" type="button" onclick="clearForm()" name="reset_button" value="Reset"/><input class="button" type="submit" name="submit_button"/></p>
		</form>
	</article>
	
	<footer>
		<?php
			echo "<p>", $message, "</p>";
		?>
		<!-- Disclaimer Message -->
		<div id="disclaimer">
			<p>Disclaimer</p>
			<p>This website is created mainly for educational and non-commercial use only. It is a partial fulfillment for completion of unit COS30020 - Web Application Development offered in Swinburne University of Technology, Sarawak Campus for Semester 2, 2019. The web-master and author(s) do not represent the business entity. The content of the pages of this website might be out-dated or inaccurate, thus, the author(s) and web-master does not take any responsibility for incorrect information disseminate or cited from this website.</p>
		</div>
	</footer>
	<script src="scripts/functions.js"></script>
</body>
</html>
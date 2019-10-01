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
					
					if ($valid1 == true and $valid2 == true and $valid3 == true)
					{
						$finalValid = true;
					}
				}
				
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
				// FILTER_VALIDATE_EMAIL is a PHP built-in constant to vaildate email
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
				$message .= "Email address is incorrect.<br/>";
				}
			}
			
			// Only move to next page if message is empty
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
		<form action="rating_landing.php" method="get">
		<p>First Name*: <input type="text" name="fName" required="required"></p>
		<p>Last Name*: <input type="text" name="lName" required="required"></p>
		<p>Registration ID*: <input type="text" name="regID" placeholder="KM-xx-yyyy"></p>
		<p>Email address*: <input type="text" name="email"></p>
		<p>
			<img src="captcha.php"/>
		</p>
		<p><input class="button" type="reset" name="reset_button"><input class="button" type="submit" name="submit_button"></p>
		</form>
	</article>
	
	<footer>
		<?php
			echo "<p>", $message, "</p>";
		?>
	</footer>

</body>
</html>
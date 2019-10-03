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
		function init_Captcha()
		{
			$num1=rand(1,9);
			$num2=rand(1,9);
			$total=$num1+$num2;
			
			$_SESSION["total"] = $total;

			$_SESSION["display"] = "$num1 + $num2 = ";
		}
		
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
				
				$num1=rand(1,9);
				$num2=rand(1,9);
				$total=$num1+$num2;
			
				$_SESSION["total"] = $total;

				$display = "$num1 + $num2 = ";
			}
			else
			{
				if(!($captcha == $_SESSION["total"]))
				{
					$message .= "Captcha is incorrect. Please try the captcha again.<br/>";
					
					// Resets captcha value
					$num1=rand(1,9);
					$num2=rand(1,9);
					$total=$num1+$num2;
			
					$_SESSION["total"] = $total;

					$display = "$num1 + $num2 = ";
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
			$num1=rand(1,9);
			$num2=rand(1,9);
			$total=$num1+$num2;
			
			$_SESSION["total"] = $total;

			$display = "$num1 + $num2 = ";
		}
	?>
	
	<article>
		<form action="rating_landing.php" method="get">
		<p>First Name*: <input type="text" name="fName" required="required"/></p>
		<p>Last Name*: <input type="text" name="lName" required="required"/></p>
		<p>Registration ID*: <input type="text" name="regID" placeholder="KM-xx-yyyy"/></p>
		<p>Email address*: <input type="text" name="email"/></p>
		
		<p>Please enter the answer for the captcha below:</p>
		<?php
			echo "<div id='captcha'>", $display, "</div>";
		?>
		<p><input type="text" name="captcha" /></p>
		
		<p><input class="button" type="reset" name="reset_button"/><input class="button" type="submit" name="submit_button"/></p>
		</form>
	</article>
	
	<footer>
		<?php
			echo "<p>", $message, "</p>";
		?>
	</footer>

</body>
</html>
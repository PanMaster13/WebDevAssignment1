<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rating Landing</title>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
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
			
			// Checking First Name Value
			if (empty($firstName))
			{
				$message .= "First Name is required.<br/>";
			}
			else
			{
				if (!preg_match("/^[a-zA-Z ]*$/", $firstName))
				{
					$message .= "First Name is incorrect.<br/>";
				}
			}
			
			// Checking Last Name Value
			if (empty($lastName))
			{
				$message .= "Last Name is required.<br/>";
			}
			else
			{
				if (!preg_match("/^[a-zA-Z ]*$/", $LastName))
				{
					$message .= "Last Name is incorrect.<br/>";
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
			
			if ($message != "")
			{
				header("Location: rating_landing.php");
			}
			else if($message == "")
			{
				header("Location: rating_input.php");
			}
		}
		else
		{
			$message = "";
		}
	?>
	
	<article>
		<form action="validation1.php" method="get">
		<p>First Name: <input type="text" name="fName"></p>
		<p>Last Name: <input type="text" name="lName"></p>
		<p>Registration ID: <input type="text" name="regID"></p>
		<p>Email address: <input type="text" name="email"></p>
		<p><input type="submit" name="submit_button"></p>
		</form>
	</article>
	
	<footer>
		<?php
			echo $message;
		?>
	</footer>
</body>
</html>
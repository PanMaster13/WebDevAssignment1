<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Jason">
</head>

<body>
	<?php
		$_SESSION["errorMsg"] = "";
	
		$_SESSION["fName"] = $_GET["fName"];
		$_SESSION["lName"] = $_GET["lName"];
		$_SESSION["regID"] = $_GET["regID"];
		$_SESSION["email"] = $_GET["email"];
		
		// Checking First Name Value
		if (empty($_SESSION["fName"]))
		{
			$_SESSION["errorMsg"] .="First Name is required.<br/>";
		}
		else
		{
			if (!preg_match("/^[a-zA-Z ]*$/", $_SESSION["fName"]))
			{
				$_SESSION["errorMsg"] .= "First Name is incorrect.<br/>";
			}
		}
		
		// Checking Last Name Value
		if (empty($_SESSION["lName"]))
		{
			$_SESSION["errorMsg"] .= "Last Name is required.<br/>";
		}
		else
		{
			if (!preg_match("/^[a-zA-Z ]*$/", $_SESSION["lName"]))
			{
				$_SESSION["errorMsg"] .= "Last Name is incorrect.<br/>";
			}
		}
		
		// Checking Email Value
		if (empty($_SESSION["email"]))
		{
			$_SESSION["errorMsg"] .= "Email address is required.<br/>";
		}
		else
		{
			// FILTER_VALIDATE_EMAIL is a PHP built-in constant to vaildate email
			if (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL))
			{
				$_SESSION["errorMsg"] .= "Email address is incorrect.<br/>";
			}
		}
		
		if ($_SESSION["errorMsg"] != "")
		{
			header("Location: rating_landing.php");
		}
		else if ($_SESSION["errorMsg"] == "")
		{
			header("Location: rating_input.php");
		}
	?>
	
</body>
</html>
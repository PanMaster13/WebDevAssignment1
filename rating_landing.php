<?php
session_start();
?>

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
	
	<article>
		<form action="rating_input.php" method="get">
		<p>First Name: <input type="text" name="fName"></p>
		<p>Last Name: <input type="text" name="lName"></p>
		<p>Registration ID: <input type="text" name="regID"></p>
		<p>Email address: <input type="email" name="email"></p>
		<p><input type="submit"></p>
		</form>
	</article>
	
	<footer>
	
	</footer>
</body>
</html>
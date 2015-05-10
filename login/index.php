<?php
// FRONTEND FILE
require "../settings.php";
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw)
	{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title><?php echo $orgname; ?> Trading Post Administrator Login</title>
			<link rel="stylesheet" type="text/css" href="../style.css">
		</head>
		<body>
			<form id="adminlogin" method="POST" action="loginapi.php">
				<p id="userp"><input type="text" id="user" name="user"></p>
				<p id="passp"><input type="password" id="pass" name="pass"></p>
				<p id="subp"><input type="submit" value="Submit"></p>
			</form>
		</body>
	</html>
	<?php
	}
else
	{
	echo "<script>";
	echo "alert('You must login first.');";
	echo "window.location.replace('../');";
	echo "</script>";
	}
?>
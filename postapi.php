<?PHP
// API FILE
require "./settings.php";
function globalkick($reason)
	{
	global $pagepw;
	echo "<script>";
	echo "alert('You can not view this page because $reason. Please Try Again.');";
	echo "window.location.replace('./');";
	echo "</script>";
	}
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw)
	{
	require "./cookieread.php";
	//POST VARS
	$item = mysql_real_escape_string($_POST['item']);
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$itemdesc = mysql_real_escape_string($_POST['itemdesc']);
	// DATABASE VARS
	if(isset($_GET['laf']) and $admin === 'y')
		{
		$table = 'laf';
		}
	else
		{
		$table = 'purgatory';
		}
	//TELEPHONE
	$teltemp = '(' . $_POST['ac'] . ') ' . $_POST['exc'] . '-' . $_POST['sta'];
	$tel = mysql_real_escape_string($teltemp);
	//QUERY
	$queryw = "
	INSERT INTO $table (itemtitle, poster, postermail, phone, description) 
	VALUES('$item', '$name', '$email', '$tel', '$itemdesc')
	";
	//MYSQL INSERT COMMAND
	mysql_query ($queryw, $database);
	?><script><?php
	if($table != 'laf')
		{
		echo "alert('Your post has been sent to the $orgname Trading Post. We will review your post, please check back in a few days.');";
		echo "window.location.replace('./?pw=776875965440');";
		}
	else
		{
		echo "window.location.replace('./laf.php?pw=$pagepw');";
		}
	echo "</script>";
	}
else
	{
	echo 'notloggedin';
	globalkick('you are not logged in');
	}
?>
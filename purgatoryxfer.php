<?php
// API FILE
require "./settings.php";
require "./cookieread.php";
function kick($reason)
	{
	global $pagepw;
	echo "<script>";
	echo "alert('We can not transfer that post because $reason. Please try again.');";
	echo "window.location.replace('./?pw=$pagepw');";
	echo "</script>";
	}
if($admin === 'y')
	{
	if(isset($_GET['id']))
		{
		$id = mysql_real_escape_string($_GET['id']);
		$queryr = "SELECT * FROM purgatory WHERE id=$id";
		$resourcer = mysql_query($queryr, $database);
		$resultr = mysql_fetch_assoc($resourcer);
		//print_r($resultr);
		$title = mysql_real_escape_string($resultr['itemtitle']);
		$poster = mysql_real_escape_string($resultr['poster']);
		$mail = mysql_real_escape_string($resultr['postermail']);
		$phone = mysql_real_escape_string($resultr['phone']);
		$desc = mysql_real_escape_string($resultr['description']);
		$image = mysql_real_escape_string($resultr['imageurl']);
		$queryw = "
		INSERT INTO tpfinal (itemtitle, poster, postermail, phone, description, imageurl) 
		VALUES('$title', '$poster', '$mail', '$phone', '$desc', '$image')
		";
		mysql_query($queryw, $database);
		$queryd = "DELETE FROM purgatory WHERE id=$id";
		mysql_query($queryd, $database);
		echo "<script>";
		echo "window.location.replace('./purgatory.php?pw=$pagepw');";
		echo "</script>";
		}
	}
else
	{
	kick('you are not authorized to access this information');
	}
?>
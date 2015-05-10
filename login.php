<?php
// BACKEND FILE
require "./settings.php";
function kick($reason)
	{
	global $orgname;
	echo "<script>";
	echo "alert('The $orgname Trading Post could not log you in because $reason. Please try again.');";
	echo "window.location.replace('./');";
	echo "</script>";
	}
if(isset($_POST['redir']) and isset($_POST['pass']))
	{
	if($_POST['pass'] === $sitepw)
		{
		echo "<script>";
		echo "window.location.replace('" . $_POST['redir'] . "?pw=$pagepw');";
		echo "</script>";
		}
	else
		{
		kick('the Password you entered was incorrect');
		}
	}
else
	{
	kick('we did not receive enough information from you');
	}
?>
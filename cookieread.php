<?php
// API FILE
require "./settings.php";
if(!isset($_GET["loginerror"]) and isset($_COOKIE[$cookiename]))
	{
	$cdata = explode('-', $_COOKIE[$cookiename]);	
	$username = $cdata['0'];
	$textpw = $cdata['1'];
	$randpw = $cdata['2'];
	if($username === $adminuser and $textpw === $adminpass and $randpw === 'v6uRam1IFv0Eiw7Sag51')
		{
		$admin = 'y';
		}
	else
		{
		$admin = 'n';
		}
	}
else
		{
		$admin= 'n';
		}

?>
<?php
// API FILE
require "./settings.php";
require "./cookieread.php";
$deloverride = "3358545629" . $_GET['id'] . "7354319173";
//echo $deloverride;
/* I really wish PHP will provide a live console so I can see what the 
if statements are comparing, so I don't need to keep echoing out variables */
function deletePost($src,$id,$database,$redir)
	{
	global $pagepw;
	$queryd = "DELETE FROM $src WHERE id=$id";
	mysql_query($queryd, $database);
	echo "<script>";
	echo "window.location.replace('$redir?pw=$pagepw');";
	echo "</script>";
	}
function kick($reason)
	{
	global $pagepw;
	echo "<script>";
	echo "alert('We can not delete that post because $reason. Please try again.');";
	echo "window.location.replace('./?pw=$pagepw');";
	echo "</script>";
	}
if($admin === 'y')
	{
	if(!isset($_GET['src']) or !isset($_GET['id']))
		{
		// BAD GET VARIABLES
		kick('we did not receive the right information');
		} else {
		// GOOD GET VARS
		if ($_GET['src'] == 'indx')
			{
			deletePost('tpfinal',$_GET['id'],$database,'./');
			}
		elseif($_GET['src'] == 'purg')
			{
			deletePost('purgatory',$_GET['id'],$database,'./purgatory.php');
			}
		elseif($_GET['src'] == 'laf')
			{
			deletePost('laf',$_GET['id'],$database,'./laf.php');
			}
		else
			{
			kick('the source you inputted does not exist');
			}
		}
	} 
else 
	{
	// NOT ADMIN
	if(isset($_GET['override']) and $_GET['override'] === $deloverride)
		{
		// OVERRIDE AUTHENTICATED
		if ($_GET['src'] == 'indx')
			{
			deletePost('tpfinal',$_GET['id'],$database);
			}
		elseif($_GET['src'] == 'purg')
			{
			deletePost('purgatory',$_GET['id'],$database);
			}
		elseif($_GET['src'] == 'laf')
			{
			deletePost('lostfound',$_GET['id'],$database);
			}
		else
			{
			kick('the source you inputted does not exist');
			}
		}
	else
		{
		kick('you are not authorized to access this page');
		}
	}
?>
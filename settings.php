<?php
// API FILE
/*

	This file allows you to customize your Trading Post. There are comments at the end of each line that
	tell you what the settings do and examples in the parentheses. If you see in the parentheses (y/n), this
	is a yes or no question and only y or n is accepted in the quotes. Make sure you put ALL answers EXCEPT
	the database variables section into single quotes. ( ' ) The database variables section requires double
	quotes. ( " ) 

*/


/* ----- NAME VARIABLES ----- */
$orgname = 'Troop 001'; /* organization name and number (Troop 001)*/

$orgnum = '001'; /* troop number (001) */

$chartorg = 'Church of OurTown'; /* charter organization (Church of OurTown) */

$pagepw = '8ywfz3pqf2t9'; /* GET variable password, random string of 12 characters, be sure to change it and DON'T make it memorable */

$sitepw = 'example_sitepass'; /* this password you DO want to be memorable, set it to anything you like, it's what users will use to log in */


/* ----- DATABASE VARIABLES ----- */

$database = mysql_connect("host" , "user" , "password"); /* your MySQL database connection information, update it for your server */

mysql_select_db("tradingpost", $database); /* replace the first string in the ()s with your DB table name */


/* ----- ADMINISTRATOR ACCOUNT ----- */

$adminuser = 'admin_user'; /* the admin account username */

$adminpass = 'example_adminpass'; /* the admin account password */


/* ----- LOST AND FOUND CONFIGURATION ----- */

$lafmail = 'lostandfound@example.com'; /* the email for lost and found inquiries to go */

$lafadv = 'y'; /* pre-fill the "your name" field on the lost and found administrator page (y/n) */

$lafname = 'the Lost and Found team'; /* lost and found manager's name (Mr. Lostandfound) or (Lost and Found team) */

$lafac = '555'; /* area code of the guy in $lafname (xxx-555-5555) */

$lafexc = '555'; /* first 3 digits in the phone number of the guy in $lafname (555-xxx-5555)*/

$lafsta = '5555'; /* last 4 digits in the phone number of the guy in $lafname (555-555-xxxx)*/


/* ----- FOOTER IMAGE ----- */

$footerimg = 'y'; /* enable footer image (y/n) */

$footerurl = 'http://www.example.com'; /* footer image link url if enabled above [must include http://] (http://www.example.com) */

$footeralt = 'Powered By example.com'; /* footer image alternate text if enabled above (this is our footer) */


/* ---------- DO NOT CONFIGURE BELOW THIS LINE ---------- */


$cookiename = $orgnum . 'adminlogin';
/*function globalkick($reason)
	{
	global $pagepw;
	echo "<script>";
	echo "alert('You can not view this page because $reason. Please Try Again.');";
	echo "window.location.replace('./');";
	echo "</script>";
	}*/
?>
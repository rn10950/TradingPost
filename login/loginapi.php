<?php
// API FILE
require "../settings.php";
$redir = $_POST['redir'];
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw)
	{
	if($_POST['user'] === $adminuser and $_POST['pass'] === $adminpass)
		{
		$username = $_POST['user'];
		$textpw = $_POST['pass'];
		$randpw = 'v6uRam1IFv0Eiw7Sag51';
		$makecookie = 'true';
		}
	else
		{
		$makecookie = 'false';
		}
	if($makecookie == 'true')
		{
		$value = $username . '-' . $textpw . '-' . $randpw;
		setcookie($cookiename, $value, time()+31556940, "/");
		echo "<script type='text/javascript'>\n";
		echo "window.location.replace('.$redir?pw=$pagepw');\n";
		echo "</script>";
		}
	else
		{
		echo "<script type='text/javascript'>\n";
		echo "alert('Login Error');\n";
		echo "window.location = '../?pw=$pagepw&adminlogin';\n";
		echo "</script>";
		}
	}
else
	{
	echo 'PagePW incorrect';
	?>
	<!--<script>
	alert('You must be logged in to view this page.')
	window.location.replace('.<?php echo $redir; ?>');
	</script>-->
	<?php
	}
?>
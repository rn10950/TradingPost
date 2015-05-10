<?php
// FRONTEND FILE
require "./settings.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $orgname; ?> Trading Post <?php if($admin === 'y'){echo'[Admin]';}?></title>
	<script src="jquery.js"></script>
	<script src="post.js"></script>
	<!--[if (lt IE 7)]>
		<link rel="stylesheet" type="text/css" media="screen, projection" href="ie6.css">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="stylesheet" type="text/css" href="./post.css">
</head>
<body>
	<div id="postdiv">
		<div id="postcontdiv">
			<div id="postclose">x</div>
			<form id="postform" method="POST" action="postapi.php">
				<h2 id="formtitleh2">Post to the <?php echo $orgname; ?> Trading Post</h2>
				<table id="formtable">
					<tr>
						<td>
							Item Name:
						</td>
						<td>
							<input type="text" id="itembox" name="item" class="txtinputpost">
						</td>
					</tr>
					<tr>
						<td>
							Your Name:
						</td>
						<td>
							<input type="text" id="namebox" name="name" class="txtinputpost">
						</td>
					</tr>
					<tr>
						<td>
							Your E-mail:
						</td>
						<td>
							<input type="text" id="mailbox" name="email" class="txtinputpost">
						</td>
					</tr>
					<tr>
						<td>
							Your Telephone:
						</td>
						<td id="teltitle">
							(<input type="text" id="acbox" name="ac" maxlength="3">) 
							<input type="text" id="excbox" name="exc" maxlength="3"> - <input type="text" id="stabox" name="sta" maxlength="4">
						</td>
					</tr>
					<tr>
						<td>
							Item Description:
						</td>
						<td>
							<textarea id="itemarea" name="itemdesc" class="txtinputpost"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" id="submitcell">
							<input type="submit" value="Submit" id="submitbutton">
						<td>
					</tr>
				</table>
			</form>
		</div>
	</div>
<h1 id="postlink">Show/hide post</h1>
</body>
</html>
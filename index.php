<?php
// FRONTEND FILE
require "./settings.php";
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw)
	{
	require "./cookieread.php";
	//$admin = 'y'; /* uncomment when testing admin layout */
	//$admin = 'n'; /* uncomment to view standard user layout */
	$query = "SELECT * FROM tpfinal ORDER BY id DESC";
	$resource = mysql_query($query, $database);
	while($row = mysql_fetch_array($resource))
		{
		$rows[] = $row;
		}
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title><?php echo $orgname; ?> Trading Post<?php if($admin === 'y'){echo' [Admin]';}?></title>
			<script src="jquery.js"></script>
			<script src="post.js"></script>
			<script src="disclaimer.js"></script>
			<!--[if (lt IE 8)]>
				<script>
				window.location.replace("/MSIE/");
				</script>
			<![endif]-->
			<link rel="stylesheet" type="text/css" href="./style.css">
			<link rel="stylesheet" type="text/css" href="./post.css">
			<link rel="stylesheet" type="text/css" href="./disclaimer.css">
			<?php
			if(isset($_GET['adminlogin']))
				{
				echo '<style>';
				echo '#adminlogindiv {}';
				echo '</style>';
				}
			else
				{
				echo '<style>';
				echo '#adminlogindiv {display:none;}';
				echo '</style>';
				}
			?>
		</head>
		<body>
		<?php
		if(!isset($_COOKIE['tp_disc'])) // Launches disclaimer if cookie not set
			{
			require('./disclaimer.php');
			}
		?>
		<div id="postdiv">
			<div id="postcontdiv">
				<div id="postclose">x</div>
				<form id="postform" method="POST" action="postapi.php?pw=<?php echo $pagepw; ?>">
					<h2 id="formtitleh2">Add to the <?php echo $orgname; ?> Trading Post</h2>
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
		<div id="adminlogindiv">
			<div id="adminlicont">
				<div id="ali_close">
					x
				</div>
				<h2 id="admintitle">Administrator Login</h2>
				<form id="adminform" action="./login/loginapi.php?pw=<?php echo $pagepw; ?>" method="POST">
					<table id="ali_table">
						<tr>
							<td class="ali_text ali_col1">
								Username:
							</td>
							<td>
								<input type="text" id="ali_user" name="user" class="ali_box">
							</td>
						</tr>
						<tr>
							<td class="ali_text ali_col1">
								Password:
							</td>
							<td>
								<input type="password" id="ali_pass" name="pass" class="ali_box">
							</td>
						</tr>
						<tr>
							<td class="ali_col1">
							</td>
							<td id="ali_subtd">
								<input type="submit" value="Submit" id="ali_submit">
							</td>
						</tr>
					</table>
				<?php
				if(isset($_GET['redir']))
					{
					echo '<input type="hidden" value="' . $_GET['redir'] . '" name="redir">';
					}
				else
					{
					echo '<input type="hidden" value="./" name="redir">';
					}
				?>
				</form>
			</div>
		</div>
			<img src="banner.png" width="800" height="200" id="bannerimg" alt="<?php echo $orgname; ?> Trading Post"
			title="<?php echo $orgname; ?> Trading Post">
			<div id="navdiv">
				<img src="tptabs_tp.png" alt="Trading Post Navigation" usemap="#navmap">
			</div>
			<div id="tablediv">
				<?php
				if(isset($rows))
					{
					?>
					<table id="posttable" class="posttable">
					<tr class="posttable">
						<td class="posttable topcell">
							Item
						</td>
						<td class="posttable topcell">
							Name
						</td>
						<td class="posttable topcell">
							E-mail
						</td>
						<td class="posttable topcell">
							Phone
						</td>
						<td class="posttable topcell">
							Item Description
						</td>
						<?php
						if($admin === 'y')
							{
							?>
							<td class="posttable topcell">
								Admin
							</td>
							<?php
							}
						?>
					</tr>
					<?php
					foreach($rows as $array)
						{
						echo '<tr><td class="posttable">';
						//print_r($array);
						echo $array['itemtitle'] . '</td><td class="posttable">';
						echo $array['poster'] . '</td><td class="posttable">';
						echo '<a href="mailto:' . $array['postermail'] . '">' . $array['postermail'] . '</a></td><td class="posttable">';
						echo $array['phone'] . '</td><td class="posttable">';
						echo $array['description'] . '</td>';
						//echo '<td class="posttable">' . $array['imageurl'] . '</td>';
						if($admin === 'y')
							{
							?>
							<td class="posttable adminchg">
								<a href="delete.php?src=indx&id=<?php echo $array['id']; ?>">Delete</a>
							</td>
							<?php
							}
						echo '</tr>';
						}
					?>
					</table>
					<?php
					}
				else
					{
					echo '<div id="empty">Nothing in the Trading Post at this time. Please check again later.</div>';
					}
				if($admin === 'y')
					{
					echo '<a href="purgatory.php?pw=' . $pagepw . '" class="adminlink">Unposted Items</a>';
					}
				else
					{					
					echo '<a href="#" class="adminlink" id="ali_launch">Administrator Login</a>';
					}
				if($footerimg === 'y')
					{
					?>
					<div id="footerimgdiv">
						<a href="<?php echo $footerurl; ?>" target="_BLANK" id="footerimglink">
						<img src="footer.png" width="350" height="50" alt="<?php echo $footeralt; ?>"
						title="<?php echo $footeralt; ?>" id="footerimg_nli"></a>
					</div>
					<?php
					}
					?>
				<a href="#" class="postlink" id="postlink">Add to the <?php echo $orgname; ?> Trading Post</a>
			</div>				
			<map name="navmap" id="navmap">
				<area id="laf_imap_link" alt="Lost and Found" title="Lost and Found" href="./laf.php?pw=<?php echo $pagepw; ?>" shape="rect" coords="309,9,596,54" style="outline:none;" target="_self"     />
			</map>
		</body>
	</html>
	<?php
	}
else
	{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title><?php echo $orgname; ?> Trading Post <?php if($admin === 'y'){echo'[Admin]';}?></title>
			<!--[if (lt IE 8)]>
				<script>
				window.location.replace("/MSIE/");
				</script>
			<![endif]-->
			<link rel="stylesheet" type="text/css" href="./style.css">
		</head>
		<body>
			<img src="banner.png" width="800" height="200" id="bannerimg_nli" alt="<?php echo $orgname; ?> Trading Post"
			title="<?php echo $orgname; ?> Trading Post">
			<h2 id="logintitle_nli">Login With Your Trading Post Password</h2>
			<form method="POST" action="./login.php" id="indexform_nli">
				<?php
				if(isset($_GET['redir']))
					{
					echo '<input type="hidden" value="' . $_GET['redir'] . '" name="redir">';
					}
				else
					{
					echo '<input type="hidden" value="./" name="redir">';
					}
				?>
				<div id="logincont_nli">
					<input type="password" id="pwbox_nli" name="pass" placeholder="Trading Post Password" autofocus>
					<input type="submit" value="Login" id="submit_nli">
				</div>
			</form>
			<?php
			if($footerimg === 'y')
				{
				?>
				<div id="footerimgdiv">
					<a href="<?php echo $footerurl; ?>" target="_BLANK" id="footerimglink">
					<img src="footer.png" width="350" height="50" alt="<?php echo $footeralt; ?>"
					title="<?php echo $footeralt; ?>" id="footerimg_nli"></a>
				</div>
				<?php
				}
			?>
		</body>
	</html>
	<?php
	}
?>
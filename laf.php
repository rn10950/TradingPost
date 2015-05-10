<?php
// FRONTEND FILE
require "./settings.php";
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw)
	{
	require "./cookieread.php";
	//$admin = 'y'; /* uncomment when testing admin layout */
	//$admin = 'n'; /* uncomment to view standard user layout */
	$query = "SELECT * FROM laf ORDER BY id DESC";
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
			<title><?php echo $orgname; ?> Lost and Found<?php if($admin === 'y'){echo' [Admin]';}?></title>
			<script src="jquery.js"></script>
			<script src="post.js"></script>
			<!--[if (lt IE 7)]>
				<link rel="stylesheet" type="text/css" media="screen, projection" href="ie6.css">
			<![endif]-->
			<link rel="stylesheet" type="text/css" href="./style.css">
			<link rel="stylesheet" type="text/css" href="./post.css">
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
			if($admin === 'y')
				{
				?>
				<div id="postdiv">
					<div id="postcontdiv">
						<div id="postclose">x</div>
						<form id="postform" method="POST" action="postapi.php?pw=<?php echo $pagepw; ?>&laf">
							<h2 id="formtitleh2">Add to the <?php echo $orgname; ?> Lost and Found</h2>
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
										<?php
										if($lafadv == 'y')
											{
											?>
											<input type="text" id="namebox" name="name" class="txtinputpost" value="<?php echo $lafname; ?>" onfocus="this.select();" onmouseup="return false;">
											<?php
											}
										else
											{
											?>
											<input type="text" id="namebox" name="name" class="txtinputpost" onfocus="this.select();" onmouseup="return false;">
											<?php
											}
										?>
									</td>
								</tr>
								<tr>
									<td>
										Your E-mail:
									</td>
									<td>
										<input type="text" id="mailbox" name="email" class="txtinputpost" value="<?php echo $lafmail; ?>" onfocus="this.select();" onmouseup="return false;">
									</td>
								</tr>
								<tr>
									<td>
										Your Telephone:
									</td>
									<td id="teltitle">
										<?php
										if($lafadv == 'y')
											{
											?>
											(<input type="text" id="acbox" name="ac" maxlength="3" value="<?php echo $lafac; ?>" onfocus="this.select();" onmouseup="return false;">) 
											<input type="text" id="excbox" name="exc" maxlength="3" value="<?php echo $lafexc; ?>" onfocus="this.select();" onmouseup="return false;"> - 
											<input type="text" id="stabox" name="sta" maxlength="4" value="<?php echo $lafsta; ?>" onfocus="this.select();" onmouseup="return false;">
											<?php
											}
										else
											{
											?>
											(<input type="text" id="acbox" name="ac" maxlength="3" onfocus="this.select();" onmouseup="return false;">) 
											<input type="text" id="excbox" name="exc" maxlength="3" onfocus="this.select();" onmouseup="return false;"> - 
											<input type="text" id="stabox" name="sta" maxlength="4" onfocus="this.select();" onmouseup="return false;">
											<?php
											}
										?>
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
				<?php
				}
			?>
			<img src="banner.png" width="800" height="200" id="bannerimg" alt="<?php echo $orgname; ?> Trading Post"
			title="<?php echo $orgname; ?> Trading Post">
			<div id="navdiv">
				<img src="tptabs_laf.png" alt="Trading Post Navigation" usemap="#navmap">
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
							Finder's Name
						</td>
						<td class="posttable topcell">
							Finder's E-mail
						</td>
						<td class="posttable topcell">
							Finder's Phone
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
								<a href="delete.php?src=laf&id=<?php echo $array['id']; ?>">Delete</a>
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
					echo '<div id="empty">Nothing in Lost and Found at this time. Please check again later. If you have lost or found something,
					you can contact the Administrator below.</div>';
					}
				if($admin === 'y')
					{
					echo '<a href="#" class="adminlink"  id="postlink">Add to the ' . $orgname . ' Lost and Found</a>';
					}
				else
					{					
					echo '<a href="./?pw=' . $pagepw . '&adminlogin&redir=./laf.php" class="adminlink">Administrator Login</a>';
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
				if($admin === 'n')
					{
					?>
					<a href="mailto:<?php echo $adminmail; ?>" class="postlink" title="This will open an E-mail message to <?php echo $lafname; ?>.">
					I've Lost or Found Something</a>
					<?php
					}
				elseif($admin === 'y')
					{
					?>
					<a href="./purgatory.php?pw=<?php echo $pagepw; ?>" class="postlink">
					Unposted Items</a>
					<?php
					}
				?>
			</div>				
			<map name="navmap" id="navmap">
				<area id="tp_imap_link" alt="Trading Post" title="Trading Post" href="./?pw=<?php echo $pagepw; ?>" shape="rect" coords="13,8,300,53" style="outline:none;" target="_self"     />
			</map>
		</body>
	</html>
	<?php
	}
else
	{
	?>
	<script>
	window.location.replace('./?redir=./laf.php');
	</script>
	<?php
	}
?>
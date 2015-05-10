<?php
// FRONTEND FILE
require "./settings.php";
require "./cookieread.php";
if(isset($_GET['pw']) and $_GET['pw'] === $pagepw and $admin === 'y')
	{
	//MYSQL HEADERS
	$query = "SELECT * FROM purgatory ORDER BY id DESC";
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
			<title><?php echo $orgname; ?> Trading Post (Unposted)</title>
			<!--[if (lt IE 7)]>
				<link rel="stylesheet" type="text/css" media="screen, projection" href="ie6.css">
			<![endif]-->
			<link rel="stylesheet" type="text/css" href="./style.css">
		</head>
		<body>
			<img src="banner.png" width="800" height="200" id="bannerimg" alt="<?php echo $orgname; ?> Trading Post"
			title="<?php echo $orgname; ?> Trading Post">
			<h2 id="title_purg"><?php echo $orgname; ?> Trading Post (Unposted Items)</h2>
			<div id="tablediv_p">
				<?php
				if(isset($rows))
					{
					?>
					<table id="posttable" class="posttable">
					<tr>
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
						<!--<td class="posttable topcell">
							Item Image
						</td>-->
						<?php
						if($admin === 'y')
							{
							?>
							<td class="posttable topcell">
								Accept
							</td>
							<td class="posttable topcell">
								Decline
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
							<td class="posttable">
								<a href="purgatoryxfer.php?id=<?php echo $array['id']; ?>">Accept</a>
							</td>
							<td class="posttable">
								<a href="delete.php?src=purg&id=<?php echo $array['id']; ?>">Decline</a>
							</td>
							<?php
							}
						echo '</tr>';
						}
					echo '</table>';
					}
				else
					{
					echo '<div id="empty">Nothing in the Trading Post at this time. Please check again later.</div>';
					}
				if($admin === 'y')
					{
					echo '<a href="laf.php?pw=' . $pagepw . '" id="adminlink" class="adminlink">Lost &amp; Found</a>';
					}
				else
					{					
					echo '<a href="laf.php?pw=' . $pagepw . '" id="adminlink" class="adminlink">Lost &amp; Found</a>';
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
				<a href="./?pw=<?php echo $pagepw; ?>" id="postlink" class="postlink"><?php echo $orgname; ?> Trading Post Home</a>
			</div>
		</body>
	</html>
	<?php
	}
else // not logged in, redirect user to appropriate login page
	{
	function kickpurg($reason)
		{
		global $pagepw;
		global $orgname;
		if($reason === 'noadmin')
			{
			echo '<script>';
			echo "alert('You must be an Administrator to view this page.');";
			echo "window.location.replace('./?id=$pagepw&adminlogin&redir=./purgatory.php');";
			echo '</script>';
			}
		elseif($reason === 'nopagepw')
			{
			echo '<script>';
			echo "alert('You are not logged in to the $orgname Trading Post')";
			echo "window.location.replace('./?redir=./purgatory.php')";
			echo '</script>';
			}
		}
	if(!isset($_GET['pw']) or $_GET['pw'] != $pagepw)
		{
		kickpurg('nopagepw');
		}
	elseif($admin === 'n')
		{
		kickpurg('noadmin');
		}
	}
?>
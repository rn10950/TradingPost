<?php 
//$debug = 'y'; // Uncomment $debug to be able to view this page without an include
if(isset($debug))
	{
	$orgname = 'Troop 440'; 
	$chartorg = 'American Legion Post 488';
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Disclaimer Test</title>
		<link rel="stylesheet" type="text/css" href="./disclaimer.css">
		<script src="./jquery.js"></script>
		<script src="./disclaimer.js"></script>
	</head>
	<body>
	<?php
	}
	/*
	
			EDIT THE DISCLAIMER BELOW
			-------------------------
	
	*/
?>
<div id="disc_bg">
	<div id="disc_cont">
	
		<h2 id="disc_title">Disclaimer</h2>
		
		<p class="disc_p">
		<?php echo $orgname; ?> is happy to provide a forum for members to pass along items for Scouting 
		or camping that they are no longer using.  A Scout is thrifty.  Please consider donating 
		unused but useful items such as outgrown uniforms, sleeping bags, backpacks, etc. to your fellow 
		scouts who are in need. Simply click on &quot;Add to the <?php echo $orgname; ?> Trading Post&quot; 
		and complete the form to have your item considered for inclusion on our site.</p>
		
		<p class="disc_p">
		All items on the Trading Post must be donations.  No fee or payment can be expected in exchange for 
		items posted.   All transactions are final.  <?php echo $orgname; ?>, its leadership, our Charter 
		Organization  - <?php echo $chartorg; ?>, the BSA, and our Webmaster are not responsible for the 
		quality of the items or your satisfaction with what you receive through this site.  This forum is 
		merely provided as a conduit for Scouts and their families to &quot;Do a good turn&quot; and help 
		their fellow Scout &quot;Be Prepared&quot;.</p>
		
		<p id="disc_buttondiv"><button type="button" 
		id="disc_button" onclick="setCookie('tp_disc','1','20000')">Accept</button></p>
	</div>
		
</div>
<?php
if(isset($debug))
	{
	echo '</body>';
	echo '</html>';
	}
?>
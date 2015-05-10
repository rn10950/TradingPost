TRADING POST README
===================
	This document will let you know everything you need to know about the Trading Post software.

PREREQUISITES
=============
	- PHP, v5.3 or above recommended
	- MySQL, v5.5 or above recommended
	- A web server, Apache or Microsoft IIS will do

SETTING UP THE TRADING POST
===========================
	- Copy all files to a directory on your web server
	- Import 'tradingpost.sql' into your MySQL server
	- Edit 'settings.php' to customize your Trading Post. We recommend Notepad++ on Windows,
	  Sublime or TextWrangler for Mac OS X, or Gedit (GNOME) or Kate (KDE) for Linux 
	  (of course nano, vi and emacs are always options :) )
	- Customize the banner and footer images in Photoshop or GIMP. (more info below)
	- Open your browser to the directory of the Trading Post and enjoy.

CUSTOMIZING TRADING POST IMAGES
===============================
	There are three images in the root directory that you should care about:
		- banner.png
		- footer.png
		- numbers.png
	Banner.png is the image you see on the top of the page, and should include your 
	organization's name and number and any other information, images, or quotes/inside jokes
	your organization has. Banner.png is 800px wide and 200px tall. Footer.png is the image 
	you see at the bottom if the page and is usually used to link to your charter organization's
	or your web host's web page. Footer.png is 350px wide and 50px tall. Numbers.png is just a
	resource for you to get the BSA number patches. Numbers.png is not referenced on the code at 
	all and is only there for you to use as an image source for your photo editing software. 
	These images can be edited in Photoshop (Windows/OSX, commercial) or GIMP (Windows/OSX/Linux, free)
	It is recommended that these images have a transparent background.

FILE TREE
=========
	/
	 adminlogin.htm 	- administrator login page
	 banner.png 		- banner image
	 bg.png 		- background image for the tab switcher
	 blackout1x1.png	- image used behind overlays
	 cookieread.php 	- include file for cookie reading (for logins and stuff)
	 delete.php 		- file used to delete records from the Trading Post and Lost and Found
	 disclaimer.css 	- CSS file for the disclaimer overlay
	 disclaimer.php		- include file for the disclaimer overlay
	 footer.png 		- footer image
	 ie6.css 		- a super-special CSS file for a super-special browser ;)
	 index.php 		- home page file, also handles user login
	 jquery.js 		- jQuery file (unmodified)
	 laf.php		- lost and found file
	 login.php 		- user login backend for index.php
	 numbers.png 		- BSA numbers patch
	 post.css 		- CSS file for the add to the trading post overlay
	 post.js 		- JavaScript file for the add to the trading post overlay
	 post.php 		- include file for the add to the trading post overlay
	 postapi.php 		- add to the trading post backend
	 purgatory.php 		- frontend file where admins review user submissions
	 settings.php 		- the user-configurable PHP settings file
	 style.css 		- the main CSS document for the trading post
	 tablebg.png 		- background image for the items table
	 tptabs_laf.png 	- tabbar with lost and found selected
	 tptabs_tp.png 		- tabbar with trading post selected
	 tradingpost.sql 	- SQL import file to set up the basic trading post database
	 transparent.gif 	- required for Internet Explorer 6
	/MSIE/
		  ie6.css 		- a super-special CSS file for a super-special browser ;)
		  index.htm 		- HTML file for the outdated browser warning
		  transparent.gif 	- allows IE6 to display transparent PNG files
		 /images/
				 chrome.png 	- Chrome icon
				 firefox.png 	- Firefox icon
				 opera.png 	- Opera icon
	/login/
		   index.php 	- administrator login frontend
		   loginapi.php - administrator login backend
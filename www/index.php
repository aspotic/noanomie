<?php 
	//TODO LIST
	////////////////////
	////get order articles by (hits, rating, difficulty, date added) system working
	////create some new themes
	////make category enumeration more efficient
?>
<HTML>
	<head>
		<?php
			require("config.php");
			echo "\n";
			echo "		<title>" . $pageTitle . "</title>\n";
			echo "		<meta name='title' content='" . $pageTitle . "' />\n";
		?>
		
		<link rel="icon" href="http://noanomie.0sites.net/favicon.ico" type="image/x-icon" />
		<link rel="StyleSheet" href="http://<?php echo $_SERVER["SERVER_NAME"] . $subFolder; ?>stylesheets/<?php echo $layout_theme; ?>.css" type="text/css" />
		<?php if ($layout_theme == "grep") { ?>
		<style type="text/css">
			body > div > div.header {
				background:
					url(<?php echo "http://noanomie.0sites.net/images/" . "headerback" . $imgTheme . "l.jpg"; ?>) top left no-repeat,
					url(<?php echo "http://noanomie.0sites.net/images/" . "headerback" . $imgTheme . "r.jpg"; ?>) top right no-repeat,
					url(<?php echo "http://noanomie.0sites.net/images/" . "headerback" . $imgTheme . "m.jpg"; ?>) top left repeat-x;

				transform: rotate(<?php echo $imgRotate; ?>deg);
				-ms-transform: rotate(<?php echo $imgRotate; ?>deg); 
				-webkit-transform: rotate(<?php echo $imgRotate; ?>deg); 
				-o-transform: rotate(<?php echo $imgRotate; ?>deg); 
				-moz-transform: rotate(<?php echo $imgRotate; ?>deg); 
			}
				
			body > div > div.header > div.image {
				transform: rotate(<?php echo ($imgRotate+1)*-1; ?>deg) translate(-50px,0px);
				-ms-transform: rotate(<?php echo ($imgRotate+1)*-1; ?>deg) translate(-50px,0px);
				-webkit-transform: rotate(<?php echo ($imgRotate+1)*-1; ?>deg) translate(-50px,0px); 
				-o-transform: rotate(<?php echo ($imgRotate+1)*-1; ?>deg) translate(-50px,0px); 
				-moz-transform: rotate(<?php echo ($imgRotate+1)*-1; ?>deg) translate(-50px,0px);    
			}
				
			body > div > div.header > div.links {
				transform: translate(0px,15px) rotate(<?php echo $imgRotate*-1; ?>deg);
				-ms-transform: translate(0px,15px) rotate(<?php echo $imgRotate*-1; ?>deg);
				-webkit-transform: translate(0px,15px) rotate(<?php echo $imgRotate*-1; ?>deg); 
				-o-transform: translate(0px,15px) rotate(<?php echo $imgRotate*-1; ?>deg); 
				-moz-transform: translate(0px,15px) rotate(<?php echo $imgRotate*-1; ?>deg); 
			}
		</style>	
		<?php } ?>
		</head>
		<body>
		<?php
			//if using ie, tell the user their browser sucks
			if (($browser->getBrowser() == Browser::BROWSER_IE )) {
				echo "<span id='IEMsg'>\n";
				echo "You are using either Internet Explorer. Stop because it sucks. They do not comply to the standards that everyone else does<br />";
				echo "To get the best experience, use Firefox, or Opera<br />";
				echo "To get the second best experience, use Chrome, or Safari<br />";
				echo "</span>\n";
			}
		?>
	<div>
		<div id="themes">
			<ul>
				<li>Select a Theme</li>
				<li><a href="http://noanomie.0sites.net/index.php/theme/legacy">legacy</a></li>
				<!--<li><a href="http://noanomie.0sites.net/index.php/theme/original">original</a></li>-->
				<li><a href="http://noanomie.0sites.net/index.php/theme/grep">grep</a></li>
				<li><a href="http://noanomie.0sites.net/index.php/theme/bright">bright</a></li>
				<li><a href="http://noanomie.0sites.net/index.php/theme/mini">mini</a></li>
			</ul>
		</div>
		<div class="header">
			<div class="image">
				<?php 
					if ($layout_theme == "bright") { 
						echo "NoAnomie\n";
						echo "<div id='logo'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'></div></div></div></div></div></div></div></div>\n";
					} else if ($layout_theme == "mini") { 
						echo "NoAnomie\n";
						echo "<div id='logo'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'></div></div></div></div></div></div></div></div>\n";
					}
				?>
			</div>
			<div class="links">
				<a class="link1" href="<?php echo $rootURL; ?>">Home</a>
				<a class="link2" href="<?php echo $rootURL; ?>mainCategory/recentArticles">Recent Articles</a>
				<a class="link1" href="<?php echo $rootURL; ?>mainCategory/articleDB">Article Database</a>
				<a class="link2" href="<?php echo $rootURL; ?>mainCategory/recentLinks">Recent Favorite Sites</a>
				<a class="link1" href="<?php echo $rootURL; ?>mainCategory/linksDB">Favorite Sites Database</a>
				<a class="link2" href="<?php echo $rootURL; ?>mainCategory/messageMe">Message Me</a>
			</div>
		</div>
		<div class="body">
			<?php 
				//show a paging category
				if ($pageType == "paging")
					paging($pageSubTitle, $pageTable, $pageOrderDirection, $pageOrderMethod, $pageDataScript, $offset);
				else if ($pageType == "multiCat")
					multiCat($pageSubTitle, $pageTable, $pageOrderDirection, $pageOrderMethod, $pageDataScript, $pageGoToCategory);
				else if ($pageType == "listData")
					listData($pageSubTitle, $pageTable, $pageOrderDirection, $pageOrderMethod, $pageDataScript);
				else if ($pageType == "showArticle")
					showArticle($pageTable, $articleID, $pageDataScript);
				else if ($pageType == "pagingLimited")
					pagingLimited($pageTable, $pageOrderDirection, $pageOrderMethod, $pageDataScript, $offset, $limiterType , $limiterName);
				else if ($pageType == "leaveSite")
					leaveSite($pageTable, $pageDataScript, $pageDataScript);
				else if ($pageType == "messageMe")
					require($pageDataScript);	
			?>
		</div>
		<div class="footer">
			<?php echo $footerText ?>
		</div>
	</div>
	</body>
</HTML>
<?php mysql_close($connect); ?>
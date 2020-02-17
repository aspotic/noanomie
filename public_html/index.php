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
		
		<link rel="icon" href="http://quotidian.info/favicon.ico" type="image/x-icon" />
		<link rel="StyleSheet" href="http://<?php echo $_SERVER["SERVER_NAME"] . $subFolder; ?>stylesheets/<?php echo $layout_theme; ?>.css" type="text/css" />
		<?php if ($layout_theme == "grep") { ?>
		<style type="text/css">
			body > div > div.header {
				background:
					url(<?php echo "http://quotidian.info/images/" . "headerback" . $imgTheme . "l.jpg"; ?>) top left no-repeat,
					url(<?php echo "http://quotidian.info/images/" . "headerback" . $imgTheme . "r.jpg"; ?>) top right no-repeat,
					url(<?php echo "http://quotidian.info/images/" . "headerback" . $imgTheme . "m.jpg"; ?>) top left repeat-x;

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
				echo "You are using Internet Explorer, please stop. They do not comply to the standards and make lives misreable for web designers<br />";
				echo "To get the best experience, use Firefox, or Opera. To get the second best experience, use Chrome, or Safari<br />";
				echo "</span>\n";
			}
		?>
	<div>
		<div id="themes">
			<ul>
				<li>Select a Theme</li>
				<li><a href="http://quotidian.info/index.php/theme/legacy">legacy</a></li>
				<!--<li><a href="http://quotidian.info/index.php/theme/original">original</a></li>-->
				<li><a href="http://quotidian.info/index.php/theme/grep">grep</a></li>
				<li><a href="http://quotidian.info/index.php/theme/bright">bright</a></li>
				<li><a href="http://quotidian.info/index.php/theme/mini">mini</a></li>
			</ul>
		</div>
		<div class="header">
			<div class="image">
				<?php 
					if ($layout_theme == "bright") { 
						echo "Quotidian.Info\n";
						echo "<div id='logo'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'></div></div></div></div></div></div></div></div>\n";
					} else if ($layout_theme == "mini") { 
						echo "Quotidian.Info\n";
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
<?php mysql_close($connect); ?>

<!--
<script type="text/javascript">
//default banner house ad url 
clicksor_default_url = '';
clicksor_banner_border = '#A0D000'; clicksor_banner_ad_bg = '#FFFFFF';
clicksor_banner_link_color = '#000000'; clicksor_banner_text_color = '#666666';
clicksor_banner_text_banner = true; clicksor_banner_image_banner = false;
clicksor_layer_border_color = '#A0D000';
clicksor_layer_ad_bg = '#FFFFFF'; clicksor_layer_ad_link_color = '#000000';
clicksor_layer_ad_text_color = '#666666'; clicksor_text_link_bg = '';
clicksor_text_link_color = ''; clicksor_enable_text_link = false;
</script>
<script type="text/javascript" src="http://ads.clicksor.com/newServing/showAd.php?nid=1&amp;pid=234419&amp;adtype=&amp;sid=375058"></script>
<noscript><a href="http://www.yesadvertising.com">affiliate marketing</a></noscript>
-->

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=7760573; 
var sc_invisible=0; 
var sc_security="e47a86e7"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript><div class="statcounter"><a title="tumblr
visitor" href="http://statcounter.com/tumblr/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/7760573/0/e47a86e7/0/"
alt="tumblr visitor"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
	</body>
</HTML>




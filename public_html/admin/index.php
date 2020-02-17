<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
		static $siteTitle = "Quotidian Info";
		static $footerText = "Quotidian.Info &copy; 2010";
		static $siteFolder = "index.php";	//the name of the index page
		static $imageFolder = "images";	//The header image subfolder address
		static $errorReporting = 0;	//0 means don't show mysql errors, 1 means show mysql errors
	

		static $mysql_Host = "localhost"; 
		static $mysql_User = "quot1043_goose";
		static $mysql_Pass = "uol6^tto5iss/ool9eis?sl(pfsbalf";
		static $database = "quot1043_mainsite";
		
		$layout_theme = "grep";
	
		$connect = mysql_connect($mysql_Host, $mysql_User, $mysql_Pass);
		if(!$connect) {die("could not connect to mysql server: ". mysql_error());}
	
		$mysql_DB = mysql_select_db($database, $connect);
		if(!$mysql_DB) {die("could not connect to mysql database: ". mysql_error());}

		//set the current date variable
		$date = date("o-m-d");
		
		$rootURL = "http://" . $_SERVER["SERVER_NAME"] . "/" . $subFolder . $siteFolder . "/";
		$imageDir = "http://" . $_SERVER["SERVER_NAME"] . "/" . $subFolder . $imageFolder . "/";
		
		//set theme random values
		$imgTheme = rand(1,3);
		
		if (rand(0,1) == 0)
			$imgRotate = rand(0,5);
		else
			$imgRotate = rand(0,5) * -1;
			
		$getLayout = $_GET['layout'];
			
		if ($getLayout != "")
			$layout_theme = $getLayout;
		
		
		
	?>
	
	<title><?php echo $siteTitle; ?> Admin</title>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="wymeditor/jquery.wymeditor.min.js"></script>
<script type="text/javascript">

jQuery(function() {
    jQuery('.wymeditor').wymeditor({
        stylesheet: 'styles.css'
    });
});

</script>
	<link rel="StyleSheet" href="http://quotidian.info/stylesheets/<?php echo $layout_theme; ?>.css" type="text/css" />
	<?php if ($layout_theme == "grep") { ?>
	<style type="text/css">
		body {
			font-family: sans-serif;
			text-align: center;
		
			/*CSS3*/
			background:
				url(http://quotidian.info/images/back1mid.png) center center no-repeat,
				url(http://quotidian.info/images/back1tl.png) top left no-repeat,
				url(http://quotidian.info/images/back1tr.png) top right no-repeat,
				url(http://quotidian.info/images/back1bl.png) bottom left no-repeat,
				url(http://quotidian.info/images/back1br.png) bottom right no-repeat;
				
			background-color: #1D3C2D;
		}
	
		div.header {
			/*CSS3*/
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
		
		div.image {
			/*CSS3*/
			transform: rotate(<?php echo ($imgRotate)*-2; ?>deg) translate(-50px,0px);
			-ms-transform: rotate(<?php echo ($imgRotate)*-2; ?>deg) translate(-50px,0px);
			-webkit-transform: rotate(<?php echo ($imgRotate)*-2; ?>deg) translate(-50px,0px); 
			-o-transform: rotate(<?php echo ($imgRotate)*-2; ?>deg) translate(-50px,0px); 
			-moz-transform: rotate(<?php echo ($imgRotate)*-2; ?>deg) translate(-50px,0px);    
		}
		
		div.links {
			/*CSS3*/
			transform: translate(0px,15px) rotate(<?php echo ($imgRotate)*(-3/2); ?>deg);
			-ms-transform: translate(0px,15px) rotate(<?php echo ($imgRotate)*(-3/2); ?>deg);
			-webkit-transform: translate(0px,15px) rotate(<?php echo ($imgRotate)*(-3/2); ?>deg); 
			-o-transform: translate(0px,15px) rotate(<?php echo ($imgRotate)*(-3/2); ?>deg); 
			-moz-transform: translate(0px,15px) rotate(<?php echo ($imgRotate)*(-3/2); ?>deg); 
		}
		
		a.link1 {
			/*CSS3*/
			transform:translate(0px,5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg);
			-ms-transform:translate(0px,5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg);
			-webkit-transform:translate(0px,5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
			-o-transform:translate(0px,5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
			-moz-transform:translate(0px,5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
		}
		
		a.link2 {
			/*CSS3*/
			transform:translate(0px,-5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg);
			-ms-transform:translate(0px,-5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg);
			-webkit-transform:translate(0px,-5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
			-o-transform:translate(0px,-5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
			-moz-transform:translate(0px,-5px) translate(0px,15px) rotate(<?php echo ($imgRotate)*(1/2); ?>deg); 
		}
	</style>
	<?php } ?>
</head>
<body>
	<div>
		<div class="header">
			<div class="image">
				<?php 
					if (($layout_theme == "bright")||($layout_theme == "mini")) { 
						echo "NoAnomie\n";
						echo "<div id='logo'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'><div id='circle'></div></div></div></div></div></div></div></div>\n";
					}
				?>
			</div>
			
			<div class="links">
				<a class="link2" href="?mainCategory=">View Stats</a>
				<a class="link1" href="?mainCategory=visitorLog">View Visitor Log</a>
				<a class="link2" href="?mainCategory=viewMessages">View Messages</a>
				<a class="link1" href="?mainCategory=createBlogEntry">Create Blog Entry</a>
				<a class="link2" href="?mainCategory=createArticle">Create Article</a>
				<a class="link1" href="?mainCategory=addFavSite">Add a Favorite Site</a>
				<!--<a class="link2" href="?mainCategory=createTheme">Create Theme</a>-->
			</div>
		</div>
		<div class="body">
			<br />
			<?php 
				//homepage shows latest info
				if ($_GET[mainCategory] == "") {
					require("subpages/stats.php");
					
				} else {
					require("subpages/" . $_GET[mainCategory] . ".php");
				}
			?>
			<br />
			<br />
		</div>
		<div class="footer">
			<?php echo $footerText ?>
		</div>
	</div>
</body>
</html>
<?php mysql_close($connect); ?>
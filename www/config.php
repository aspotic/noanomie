<?php
	////////////////////////////VARIABLES SET BY WEBMASTER//////////////////////////////////////
	//Site Info
	static $siteTitle = "NoAnomie";
	static $footerText = "NoAnomie.co.cc &copy; 2011";
	static $siteFolder = "index.php";	//the name of the index page
	static $imageFolder = "images";	//The header image subfolder address
	static $errorReporting = 0;	//0 means don't show mysql errors, 1 means show mysql errors
	$mainCategory = "blog";	//set the default main category to display
	static $numStars = 5;
	static $maxSlant = 2;
	static $numBannerBacks = 3;

	//DB Login Info
	static $mysql_Host = "localhost"; 
	static $mysql_User = "noanomie_goose";
	static $mysql_Pass = "uolttoissooleisslpfsbalf";
	static $database = "noanomie_mainsite";
	
	//Style _Settings
	$layout_theme = "grep";
	$basicLayout = "legacy";

	
	//Page Limit Settings
	static $NumRecentArticles = "5";	//Number of articles to show in the most recent articles page
	static $NumMultiCatArticles = "2";	//Number of articles to show on pages with multiple categories
	static $NumArticlesPerPage = "5";	//Number of articles to show on a page that is governed by the paging system

	
	if ($_SERVER["SERVER_NAME"] == "127.0.0.1")
		$subFolder = ":8888/noanomie/";	//The subfolder below the domain that your site resides in
	else
		$subFolder = "/";
	
	
	
	
	
	
	/////////////////'/////////DON'T EDIT ANYTHING PAST HERE//////////////'//////////////////////					
	////////////CONNECT TO WEBSITE DATABASE///////////////
	$connect = mysql_connect($mysql_Host, $mysql_User, $mysql_Pass);
	if(!$connect) {die("could not connect to mysql server: ". mysql_error());}
	
	$mysql_DB = mysql_select_db($database, $connect);
	if(!$mysql_DB) {die("could not connect to mysql database: ". mysql_error());}
	
	
	
	
	
	////////////VARIOUS SHORT COMMANDS///////////////
	//set the current date variable
	$date = date("o-m-d");
	
	//setup addressing variables
	$rootURL = "http://" . $_SERVER["SERVER_NAME"] . $subFolder . $siteFolder . "/";
	$imageDir = "http://" . $_SERVER["SERVER_NAME"] . $subFolder . $imageFolder . "/";
	$homeDir = "http://" . $_SERVER["SERVER_NAME"] . $subFolder;
	
	//get the functions used by the site
	require("functions.php");
	
	//if using ie, then switch to a ie usable layout
	$browser = new Browser();
	if (($browser->getBrowser() == Browser::BROWSER_IE)) {
		$layout_theme = $basicLayout;
	}
	
	//set sql error reporting
	error_reporting($errorReporting);

	//Log the user's data
	logUser();
	
	//
	echo "<script language='javascript' type='text/javascript' src='" . $homeDir . "js/maxrating.js'></script>\n";
	

	
	
	//////////////SET LOCATION VARIABLES/////////////////
	//create the url data array
	$urlData = processURI();
	
	//get the number of variables to process
	$size = count($urlData);
	//put the data in the proper variables.  the first item is the variable name,
	// the second is the variable value, so we need to increment in sets of two.
	for ($i = 0; $i < $size; $i+=2) {
		$j=$i+1;	//so we dont have to do +1 for each entry
		
		//see if the variable is real, and if it is, then set the value
		if ($urlData[$i] == "mainCategory")
			$mainCategory = mysql_real_escape_string($urlData[$j]);
		else if ($urlData[$i] == "limiterName")
			$limiterName = mysql_real_escape_string($urlData[$j]);
		else if ($urlData[$i] == "limiterType")
			$limiterType = mysql_real_escape_string($urlData[$j]);
		else if ($urlData[$i] == "id")
			$id = mysql_real_escape_string($urlData[$j]);
		else if ($urlData[$i] == "articleID")
			$articleID = mysql_real_escape_string($urlData[$j]);	
		else if ($urlData[$i] == "offset")
			$offset = mysql_escape_string($urlData[$j]);
		else if ($urlData[$i] == "theme")
			$layout_theme = mysql_escape_string($urlData[$j]);
	}	
	
	//use mainCategory to get page setup information
	$query = sprintf("SELECT * FROM sectionInfo WHERE mainCategory='" . $mainCategory . "'");
	$result = mysql_query($query);
	if ($row = mysql_fetch_assoc($result)) {
		$pageOrderDirection = $row['orderDirection'];
		$pageOrderMethod = $row['orderMethod'];
		$pageType = $row['type'];
		$pageSubTitle = $row['title'];
		$pageTable = $row['table'];
		$pageDataScript = $row['dataScript'];
		$pageGoToCategory = $row['goToCategory'];
	} else {
		die("could not find the category in the database: ". mysql_error());
	}
	
	
	
	/////////////////////SET PAGE TITLE////////////////////
	//if showing an article, then include the article name in the page title
	if ($mainCategory == "showArticle") {
		$query = sprintf("SELECT * FROM articles WHERE id=" . $articleID);
		$result = mysql_query($query);
		if ($row = mysql_fetch_assoc($result)) {
			$pageTitle = $siteTitle . " - " . $row['title'];
		}
	//not showing an article, so the page title is just the site name
	} else {
		$pageTitle = $siteTitle;	
	}
	
	//set theme random values
	$imgTheme = rand(1,$numBannerBacks);
		
	if (rand(0,1) == 0)
		$imgRotate = rand(0,$maxSlant);
	else
		$imgRotate = rand(0,$maxSlant) * -1;
		
	$rootURL = $rootURL . "theme/" . $layout_theme . "/";

?>
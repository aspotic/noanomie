
<?php
/*
	//connect to the new database
	echo "<h4>Get config file</h4>";
	require("../config.php");

	//Create all tables
	echo "<h4>Create Tables</h4>";
	if(mysql_query("
		CREATE TABLE IF NOT EXISTS `blog` (
		  `id` int(8) NOT NULL AUTO_INCREMENT,
		  `title` text NOT NULL,
		  `date` date NOT NULL,
		  `data` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
	")){
		echo "done: blog table";
	} else {
		die("error: blog table: " . mysql_error());
	}

	
	if(mysql_query("
		CREATE TABLE IF NOT EXISTS `favSites` (
		  `id` int(8) NOT NULL AUTO_INCREMENT,
		  `name` text NOT NULL,
		  `url` text NOT NULL,
		  `description` text NOT NULL,
		  `rating` int(1) NOT NULL DEFAULT '0',
		  `timesRated` int(11) NOT NULL DEFAULT '0',
		  `hits` int(8) NOT NULL,
		  `category` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
	")){
		echo "<br /><br />done: favSites table";
	} else {
		die("<br /><br />error: favSites table: " . mysql_error());
	}

	
	if(mysql_query("
		CREATE TABLE IF NOT EXISTS `messages` (
		  `id` int(8) NOT NULL AUTO_INCREMENT,
		  `date` date NOT NULL,
		  `name` text NOT NULL,
		  `email` text NOT NULL,
		  `data` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
	")){
		echo "<br /><br />done: messages table";
	} else {
		die("<br /><br />error: messages table: " . mysql_error());
	}

	
	if(mysql_query("
		CREATE TABLE IF NOT EXISTS `themes` (
		  `id` int(8) NOT NULL AUTO_INCREMENT,
		  `name` varchar(30) NOT NULL,
		  `marginLeft` varchar(15) NOT NULL,
		  `marginRight` varchar(15) NOT NULL,
		  `pageWidth` varchar(7) NOT NULL,
		  `fontFamily` varchar(30) NOT NULL,
		  `border` varchar(30) NOT NULL,
		  `headerImageSRC` varchar(7) NOT NULL,
		  `bBG` varchar(7) NOT NULL,
		  `bTextAlign` varchar(7) NOT NULL,
		  `hBG` varchar(7) NOT NULL,
		  `hTextAlign` varchar(7) NOT NULL,
		  `hTextColor` varchar(7) NOT NULL,
		  `hLinkColor` varchar(7) NOT NULL,
		  `hLinkHoverColor` varchar(7) NOT NULL,
		  `hVisitedLinkColor` varchar(7) NOT NULL,
		  `dBG` varchar(7) NOT NULL,
		  `dTextAlign` varchar(7) NOT NULL,
		  `dPadding` varchar(7) NOT NULL,
		  `dTextColor` varchar(7) NOT NULL,
		  `dLinkColor` varchar(7) NOT NULL,
		  `dLinkHoverColor` varchar(7) NOT NULL,
		  `dVisitedLinkColor` varchar(7) NOT NULL,
		  `fBG` varchar(7) NOT NULL,
		  `fTextAlign` varchar(7) NOT NULL,
		  `fTextColor` varchar(7) NOT NULL,
		  `fLinkColor` varchar(7) NOT NULL,
		  `fLinkHoverColor` varchar(7) NOT NULL,
		  `fVisitedLinkColor` varchar(7) NOT NULL,
		  `elementWidth` varchar(7) NOT NULL,
		  `elementBorder` varchar(30) NOT NULL,
		  `ehMinHeight` varchar(7) NOT NULL,
		  `ehBG` varchar(7) NOT NULL,
		  `ehTextAlign` varchar(7) NOT NULL,
		  `ehTextColor` varchar(7) NOT NULL,
		  `ehLinkColor` varchar(7) NOT NULL,
		  `ehLinkHoverColor` varchar(7) NOT NULL,
		  `ehVisitedLinkColor` varchar(7) NOT NULL,
		  `ebMinHeight` varchar(7) NOT NULL,
		  `ebBG` varchar(7) NOT NULL,
		  `ebTextAlign` varchar(7) NOT NULL,
		  `ebTextColor` varchar(7) NOT NULL,
		  `ebLinkColor` varchar(7) NOT NULL,
		  `ebLinkHoverColor` varchar(7) NOT NULL,
		  `ebVisitedLinkColor` varchar(7) NOT NULL,
		  `efMinHeight` varchar(7) NOT NULL,
		  `efBG` varchar(7) NOT NULL,
		  `efTextAlign` varchar(7) NOT NULL,
		  `efTextColor` varchar(7) NOT NULL,
		  `efLinkColor` varchar(7) NOT NULL,
		  `efLinkHoverColor` varchar(7) NOT NULL,
		  `efVisitedLinkColor` varchar(7) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
	")){
		echo "<br /><br />done: themes table";
	} else {
		die("<br /><br />error: themes table: " . mysql_error());
	}

	
	if(mysql_query("
		CREATE TABLE IF NOT EXISTS `articles` (
		  `id` int(8) NOT NULL AUTO_INCREMENT,
		  `date` date NOT NULL,
		  `title` text NOT NULL,
		  `description` text NOT NULL,
		  `data` text NOT NULL,
		  `rating` int(1) NOT NULL DEFAULT '0',
		  `timesRated` int(11) NOT NULL DEFAULT '0',
		  `hits` int(8) NOT NULL DEFAULT '0',
		  `category` text NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
	")){
		echo "<br /><br />done: articles table";
	} else {
		die("<br /><br />error: articles table: " . mysql_error());
	}	
	
	
	//Install premade themes
	echo "<br /><h4>Install Themes</h4>";
	if(mysql_query("
		INSERT INTO `themes` (`id`, `name`, `marginLeft`, `marginRight`, `pageWidth`, `fontFamily`, `border`, `headerImageSRC`, `bBG`, `bTextAlign`, `hBG`, `hTextAlign`, `hTextColor`, `hLinkColor`, `hLinkHoverColor`, `hVisitedLinkColor`, `dBG`, `dTextAlign`, `dPadding`, `dTextColor`, `dLinkColor`, `dLinkHoverColor`, `dVisitedLinkColor`, `fBG`, `fTextAlign`, `fTextColor`, `fLinkColor`, `fLinkHoverColor`, `fVisitedLinkColor`, `elementWidth`, `elementBorder`, `ehMinHeight`, `ehBG`, `ehTextAlign`, `ehTextColor`, `ehLinkColor`, `ehLinkHoverColor`, `ehVisitedLinkColor`, `ebMinHeight`, `ebBG`, `ebTextAlign`, `ebTextColor`, `ebLinkColor`, `ebLinkHoverColor`, `ebVisitedLinkColor`, `efMinHeight`, `efBG`, `efTextAlign`, `efTextColor`, `efLinkColor`, `efLinkHoverColor`, `efVisitedLinkColor`) VALUES (1, 'default', 'auto', 'auto', '85%', 'sans-serif', '2px solid #444A92', 'header2', '#9E97E2', 'center', '#6F74B7', 'center', '#1E2040', '#04072E', '#272C6C', '#272C6C', '#032F09', 'left', '0px', '#6F74B7', '#9EF79B', '#65CA62', '#6F74B7', '#6F74B7', 'center', '#1E2040', '#9EF79B', '#272C6C', '#272C6C', '95%', '2px solid #444A92', '20px', '#444A92', 'center', '#6F74B7', '#9EF79B', '#65CA62', '#6F74B7', '20px', '#9E97E2', 'left', '#000000', '#9EF79B', '#65CA62', '#6F74B7', '5px', '#444A92', 'left', '#6F74B7', '#9EF79B', '#65CA62', '#6F74B7');
	")){
		echo "done: default theme created";
	} else {
		die("error: default theme creation: " . mysql_error());
	}	
	
	//Return completion message
		echo "<br /><h2>Installation Successful!</h2>";
*/
?>
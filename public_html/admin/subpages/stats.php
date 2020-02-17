<?
function GetTimeStamp($MySqlDate) {
        $date_array = explode("-",$MySqlDate); // split the array
        
        $var_year = $date_array[0];
        $var_month = $date_array[1];
        $var_day = $date_array[2];

        $var_timestamp = mktime(0,0,0,$var_month,$var_day,$var_year);
        return($var_timestamp); // return it to the user
}



function GetDayDiff($ts_1, $ts_2) {
        // calculate which is the larger so we never get negative answers
        if ($ts_1 > $ts_2) {
                // $ts_1 is larger
                $var_days = ($ts_1 - $ts_2) / 86400; /// 60 / 60 / 24;
        } elseif ($ts_1 < $ts_2) {
                // $ts_1 is smaller
                $var_days = ($ts_2 - $ts_1) / 86400; /// 60 / 60 / 24;        
        } else {
                // they must be equal
                $var_days = 0;
        }
        return(floor($var_days)); //return the value
}








	$totalHits = 0;
	$totalSiteHits = 0;
	
	$sinceLastBlog = "oo";
	$sinceLastArticle = "oo";
	$sinceLastLink = "oo";
	
	$numArticles = 0;
	$numCategories = 0;
	
	$numSiteCategories = 0;
	$numSites = 0;
	
	$numBlogEntries = 0;
	$numMessages = 0;
	
	$numNewMessages = 0;
	$numVisits = 0;
	
	//ARTICLES
	//Get the list of categories from the database
	$categoryList = array();
	$query = sprintf("SELECT category, hits, date FROM articles ORDER BY `date` DESC");
	$result = mysql_query($query);
	$first = 1;
	while ($row = mysql_fetch_assoc($result)) {
		if ($first == 1) {
			$first = 0;
			$sinceLastArticle = GetDayDiff(GetTimeStamp($date), GetTimeStamp($row['date']));
		}

		//get the number of article hits, and number of articles
		$totalHits += $row['hits'];
		$numArticles++;
		//get the number of categories
		//check the category for the current row against the list of known categories
		//if it exists, then skip it, if it doesn't, then add it to the list
		$exists = 0;
		for ($i = 0; $i < $numCategories; $i++) {
			if ($row['category'] == $categoryList[$i]) {
				$exists = 1;
			}
		}
		if ($exists == 0) {
			$numCategories++;
			$categoryList[] = $row['category'];
		}
	}
	
	
	//VISITORLOG
	$query = sprintf("SELECT id FROM visitorLog");
		$result = mysql_query($query);
		while ($row = mysql_fetch_assoc($result)) {
			$numVisits++;
		}
	
	
	//FAVSITES
	$categoryList = array();
	$query = sprintf("SELECT category, hits, date FROM favSites ORDER BY `date` DESC");
	$result = mysql_query($query);
	$first = 1;
	while ($row = mysql_fetch_assoc($result)) {
		if ($first == 1) {
			$first = 0;
			$sinceLastLink = GetDayDiff(GetTimeStamp($date), GetTimeStamp($row['date']));
		}
		
		//get the number of link hits, and number of links
		$totalSiteHits += $row['hits'];
		$numSites++;
		//get the number of categories
		//check the category for the current row against the list of known categories
		//if it exists, then skip it, if it doesn't, then add it to the list
		$exists = 0;
		for ($i = 0; $i < $numSiteCategories; $i++) {
			if ($row['category'] == $categoryList[$i]) {
				$exists = 1;
			}
		}
		if ($exists == 0) {
			$numSiteCategories++;
			$categoryList[] = $row['category'];
		}
	}
	
	
	//BLOG ENTRIES
	$query = sprintf("SELECT id, date FROM blog ORDER BY `date` DESC");
	$result = mysql_query($query);
	if ($row = mysql_fetch_assoc($result)) {
		$numBlogEntries++;
		$sinceLastBlog = GetDayDiff(GetTimeStamp($date), GetTimeStamp($row['date']));
	}
	while ($row = mysql_fetch_assoc($result)) {
		$numBlogEntries++;
	}
	
	
	//Messages
	$query = sprintf("SELECT date, viewed FROM messages ORDER BY `date` DESC");
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['viewed'] == 0) {
			$numNewMessages++;
		}
		$numMessages++;
	}
	
	
	if ($_GET[subCategory] == "") {
		echo "<center><h2>Stats</h2></center>";
	
		echo "<b>Updates</b><br />";
		echo $numNewMessages . " new messages<br />";
		echo $sinceLastArticle . " days since last article<br />";
		echo $sinceLastBlog . " days since last blog entry<br />";
		echo $sinceLastLink . " days since last favourite site posting<br /><br />";
	
		echo "<b><a href='?subCategory=articleBreakdown'>Articles</a></b><br />";
		echo $totalHits . " Hits<br />";
		echo $numArticles . " Written<br />";
		echo $numCategories . " Categories<br /><br />";
	
		echo "<b><a href='?subCategory=favSitesBreakdown'>Favorite Sites</a></b><br />";
		echo $totalSiteHits . " Hits<br />";
		echo $numSites . " Links<br />";
		echo $numSiteCategories . " Categories<br /><br />";
	
		echo "<b>Blog</b><br />";
		echo $numBlogEntries . " Entries<br /><br />";
		
		echo "<b>Messages</b><br />";
		echo $numMessages . " Messages<br /><br />";
		
		echo "<b>Total Website Page Impressions</b><br />";
		echo $numVisits . " Total Website Page Impressions<br /><br />";
		
		
	} else if ($_GET[subCategory] == "articleBreakdown") {
		echo "<center><h2>Stats: Articles Breakdown</h2></center>";
		$query = sprintf("SELECT title, date, rating, timesRated, hits FROM articles ORDER BY `hits` DESC");
		$result = mysql_query($query);
		echo "<table width='100%'><tr><td><b>Hits</b></td><td><b>Rating</b></td><td><b>Date Written</b></td><td><b>Title</b></td></tr>";
		while ($row = mysql_fetch_assoc($result)) {
			if ($row['timesRated'] == 0) {
				echo "<tr><td>" . $row['hits'] .  "</td><td>unrated</td><td>" . $row['date'] .  "</td><td>" . $row['title'] .  "</td></tr>";
			} else {
				$numRatedArticles++;
				$avgArticleRating += ($row['rating']/$row['timesRated']);
				echo "<tr><td>" . $row['hits'] .  "</td><td>" . $row['rating']/$row['timesRated'] .  "</td><td>" . $row['date'] .  "</td><td>" . $row['title'] .  "</td></tr>";
			}
		}
		echo "</table>";
		
		if ($numRatedArticles == 0)
			$avgArticleRating = "unrated";
		else
			$avgArticleRating /= $numRatedArticles;
			
		echo "<br /><br /><table width='100%'><tr><td><b>Total Hits</b></td><td><b>Average Rating</b></td><td><b>Number of Articles</b></td></tr><tr><td>" . $totalHits .  "</td><td>" . $avgArticleRating .  "</td><td>" . $numArticles .  "</td></tr></table>";
		
		
	} else if ($_GET[subCategory] == "favSitesBreakdown") {
		echo "<center><h2>Stats: Favorite Sites Breakdown</h2></center>";
		$query = sprintf("SELECT name, date, rating, timesRated, hits FROM favSites ORDER BY `hits` DESC");
		$result = mysql_query($query);
		echo "<table width='100%'><tr><td><b>Hits</b></td><td><b>Rating</b></td><td><b>Date Written</b></td><td><b>Title</b></td></tr>";
		while ($row = mysql_fetch_assoc($result)) {
			if ($row['timesRated'] == 0) {
				echo "<tr><td>" . $row['hits'] .  "</td><td>unrated</td><td>" . $row['date'] .  "</td><td>" . $row['name'] .  "</td></tr>";
			} else {
				$numRatedFavSites++;
				$avgFavSiteRating += ($row['rating']/$row['timesRated']);
				echo "<tr><td>" . $row['hits'] .  "</td><td>" . $row['rating']/$row['timesRated'] .  "</td><td>" . $row['date'] .  "</td><td>" . $row['name'] .  "</td></tr>";
			}
			
		}
		echo "</table>";
		
		if ($numRatedFavSites == 0)
			$avgFavSiteRating = "unrated";
		else
			$avgFavSiteRating /= $numRatedFavSites;
			
		echo "<br /><br /><table width='100%'><tr><td><b>Total Hits</b></td><td><b>Average Rating</b></td><td><b>Number of Links</b></td></tr><tr><td>" . $totalSiteHits .  "</td><td>" . $avgFavSiteRating .  "</td><td>" . $numSites .  "</td></tr></table>";
		
	}
?>
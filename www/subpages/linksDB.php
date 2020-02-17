<?php 
	$handler = new maxRatingHandler($imageDir, $homeDir);
	
	if (($pageType == "multiCat") || ($pageType == "pagingLimited") || ($pageType == "listData")) {
		echo "<div class='element'>\n";
		echo "	<div class='header'>\n";
		echo "    <span class='title'>\n";
		echo "      <a href='" . $rootURL . "mainCategory/leaveSite/id/" . $row['id'] . "'>" . $row['name'] . "</a>\n";
		echo "    </span>\n";
		echo "    <span class='rating'>\n";
		$handler->displayRating("link" . $row['id'], $numStars);
		echo "	  </span>\n";
		echo "    <span class='date'>\n";
		echo "      " . $row['date'] . "\n";
		echo "	  </span>\n";
		echo "  </div>\n";	
		echo "	<div class='body'>\n";
		echo "		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row['description'] . "\n";
		echo "	</div>\n";
		echo "	<div class='footer'>\n";
		echo "	</div>\n";
		echo "</div>\n";
		
	}
?>	
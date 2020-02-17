<?php
   $handler = new maxRatingHandler($imageDir, $homeDir);
	if (($pageType == "multiCat") || ($pageType == "pagingLimited") || ($pageType == "listData")) {
		echo "<div class='element'>\n";
		echo "	<div class='header'>\n";
		echo "    <span class='title'>\n";
		echo "      <a href='" . $rootURL . "mainCategory/showArticle/articleID/" . $row['id'] . "'>" . $row['title'] . "</a>\n";
		echo "    </span>\n";
		echo "    <span class='date'>\n";
		echo "		" . $row['date']; 
		echo "	  </span>\n";
		echo "    <span class='rating'>\n";
		$handler->displayRating("article" . $row['id'], $numStars);
		echo "	  </span>\n";
		echo "  </div>\n";	
		echo "	<div class='body'>\n";
		echo "		" . $row['description'] . "\n";
		echo "	</div>\n";
		echo "	<div class='footer'>\n";
		echo "	</div>\n";
		echo "</div>\n";
		
	} else if ($pageType == "showArticle") {
		echo "<div class='element'>\n";
		echo "	<div class='header'>\n";
		echo "    <span class='title'>\n";
		echo "      " . $row['title'] . "\n";
		echo "    </span>\n";
		echo "    <span class='date'>\n";
		echo "		" . $row['date']; 
		echo "	  </span>\n";
		echo "    <span class='rating'>\n";
		$handler->displayRating("article" . $row['id'], $numStars);
		echo "	  </span>\n";
		echo "  </div>\n";	
		echo "	<div class='body'>\n";
		echo "		" . $row['data'] . "\n";
		echo "	</div>\n";
		echo "	<div class='footer'>\n";
		echo "	</div>\n";
		echo "</div>\n";
		
	}
?>	
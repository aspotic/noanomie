<center><h2>Messages</h2></center>
<?php 
	$query = sprintf("SELECT * FROM messages ORDER BY `id` DESC");
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)) {
		echo "<div id='element'>";
			echo "<div id='elementHead'>";
				if ($row['viewed'] == 0) {
					echo "NEW&nbsp;&nbsp;&nbsp;";
				}
				echo "<b>" . $row['name'] . "</b> at <b>" . $row['email'] . "</b> on " . $row['date'];
			echo "</div>";
			echo "<div id='elementBody'>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $row['data'] . "";
			echo "</div>";
			echo "<div id='elementFoot'>";
			echo "</div>";
		echo "</div><br />";
	}
	
	$query = sprintf("UPDATE messages SET viewed=1 WHERE viewed=0");
	$result = mysql_query($query);
	if (!$result) {
		die("error marking new messages as read: " . mysql_error());
	}
?>			
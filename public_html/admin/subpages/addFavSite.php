<center><h2>Add a Favorite Site</h2></center>
<?php
	if ($_POST['submitted'] == "1") {
		$query = sprintf("INSERT INTO favSites (name, url, description, category, date) VALUES ('" . mysql_real_escape_string($_POST['name']) . "', '" . mysql_real_escape_string($_POST['url']) . "', '" . mysql_real_escape_string($_POST['description']) . "', '" . mysql_real_escape_string($_POST['category']) . "', '" . mysql_real_escape_string($date) . "')");
		$result = mysql_query($query);
		if ($result) {
			echo "<center>the link was added</center>";
		} else {
			die("Failed to add link: " . mysql_error());
		}
		
	} else {
?>
		<center>
			<form action="?mainCategory=addFavSite" method="post">
				<input onfocus="if(this.value == 'name')this.value='';" class="form" type="text" name="name" value="name" /><br /><br />
				<input class="form" type="text" name="url" value="http://www." /><br /><br />
				<input onfocus="if(this.value == 'category')this.value='';" class="form" type="text" name="category" value="category" /><br /><br />
				Description:<br /><textarea class="form" name="description" rows="3"></textarea><br />
				<input class="form" type="hidden" name="submitted" value="1" /><br />
				<input class="form" type="submit" value="Submit" /><br />
			</form>
		</center>
<?php 
	}
?>
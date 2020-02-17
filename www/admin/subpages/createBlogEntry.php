<center><h2>Create Blog Entry</h2></center>
<?php
	if ($_POST['submitted'] == "1") {
		$query = sprintf("INSERT INTO blog (date, title, data) VALUES ('" . mysql_real_escape_string($date) . "', '" . mysql_real_escape_string($_POST['title']) . "', '" . mysql_real_escape_string($_POST['data']) . "')");
		$result = mysql_query($query);
		if ($result) {
			echo "<center>the blog entry was created</center>";
		} else {
			die("Failed to create the blog entry: " . mysql_error());
		}
		
	} else {
?>
		<center>
			<form action="?mainCategory=createBlogEntry" method="post">
				<input onfocus="if(this.value == 'title')this.value='';" class="form" type="text" name="title" value="title" /><br /><br />
				Entry Body:<br /><textarea class="wymeditor" name="data" rows="10"></textarea><br />
				<input class="form" type="hidden" name="submitted" value="1" /><br />
				<input class="wymupdate" type="submit" value="Submit" /><br />
			</form>
		</center>
<?php 
	}
?>
<center><h2>Create an Article</h2></center>
<?php
	if ($_POST['submitted'] == "1") {
		$query = sprintf("INSERT INTO articles (date, title, description, data, category) VALUES ('" . mysql_real_escape_string($date) . "', '" . mysql_real_escape_string($_POST['title']) . "', '" . mysql_real_escape_string($_POST['description']) . "', '" . mysql_real_escape_string($_POST['data']) . "', '" . mysql_real_escape_string($_POST['category']) . "')");
		$result = mysql_query($query);
		if ($result) {
			echo "<center>the article was created</center>";
		} else {
			die("Failed to create article: " . mysql_error());
		}
		
	} else {
?>
		<center>
			<form action="?mainCategory=createArticle" method="post">
				<input onfocus="if(this.value == 'title')this.value='';" class="form" type="text" name="title" value="title" /><br /><br />
				<input onfocus="if(this.value == 'category')this.value='';" class="form" type="text" name="category" value="category" /><br /><br />
				Article Description:<br /><textarea class="form" name="description" rows="2"></textarea><br /><br />
				Article Body:<br /><textarea class="wymeditor" name="data" rows="10"></textarea><br />
				<input class="form" type="hidden" name="submitted" value="1" /><br />
				<input class="wymupdate" type="submit" value="Submit" /><br />
			</form>
		</center>
<?php 
	}
?>
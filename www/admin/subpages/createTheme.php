<center><h2>Create Color Theme</h2></center>
<?php
	if ($_POST['submitted'] == "1") {
		$query = sprintf("INSERT INTO themes (name,marginLeft, marginRight, pageWidth, fontFamily, border, headerImageSRC, 
			bBG, bTextAlign, hBG, hTextAlign, hTextColor, hLinkColor, hLinkHoverColor, hVisitedLinkColor, dBG, dTextAlign,
			dPadding, dTextColor, dLinkColor, dLinkHoverColor, dVisitedLinkColor, fBG, fTextAlign, fTextColor, fLinkColor, 
			fLinkHoverColor, fVisitedLinkColor, elementWidth, elementBorder, ehMinHeight, ehBG, ehTextAlign, ehTextColor, 
			ehLinkColor, ehLinkHoverColor, ehVisitedLinkColor, ebMinHeight, ebBG, ebTextAlign, ebTextColor, ebLinkColor, 
			ebLinkHoverColor, ebVisitedLinkColor, efMinHeight, efBG, efTextAlign, efTextColor, efLinkColor, efLinkHoverColor, 
			efVisitedLinkColor) VALUES ('" . mysql_real_escape_string($_POST['name']) . "', '" . 
			mysql_real_escape_string($_POST['marginLeft']) . "', '" . 			mysql_real_escape_string($_POST['marginRight']) . "', '" . 
			mysql_real_escape_string($_POST['pageWidth']) . "', '" . 			mysql_real_escape_string($_POST['fontFamily']) . "', '" . 
			mysql_real_escape_string($_POST['border']) . "', '" . 				mysql_real_escape_string($_POST['headerImageSRC']) . "', '" . 
			mysql_real_escape_string($_POST['bBG']) . "', '" . 					mysql_real_escape_string($_POST['bTextAlign']) . "', '" . 
			mysql_real_escape_string($_POST['hBG']) . "', '" . 					mysql_real_escape_string($_POST['hTextAlign']) . "', '" . 
			mysql_real_escape_string($_POST['hTextColor']) . "', '" . 			mysql_real_escape_string($_POST['hLinkColor']) . "', '" . 
			mysql_real_escape_string($_POST['hLinkHoverColor']) . "', '" . 		mysql_real_escape_string($_POST['hVisitedLinkColor']) . "', '" . 
			mysql_real_escape_string($_POST['dBG']) . "', '" . 					mysql_real_escape_string($_POST['dTextAlign']) . "', '" . 
			mysql_real_escape_string($_POST['dPadding']) . "', '" . 			mysql_real_escape_string($_POST['dTextColor']) . "', '" . 
			mysql_real_escape_string($_POST['dLinkColor']) . "', '" . 			mysql_real_escape_string($_POST['dLinkHoverColor']) . "', '" . 
			mysql_real_escape_string($_POST['dVisitedLinkColor']) . "', '" . 	mysql_real_escape_string($_POST['fBG']) . "', '" . 
			mysql_real_escape_string($_POST['fTextAlign']) . "', '" . 			mysql_real_escape_string($_POST['fTextColor']) . "', '" . 
			mysql_real_escape_string($_POST['fLinkColor']) . "', '" . 			mysql_real_escape_string($_POST['fLinkHoverColor']) . "', '" . 
			mysql_real_escape_string($_POST['fVisitedLinkColor']) . "', '" . 	mysql_real_escape_string($_POST['elementWidth']) . "', '" . 
			mysql_real_escape_string($_POST['elementBorder']) . "', '" . 		mysql_real_escape_string($_POST['ehMinHeight']) . "', '" . 
			mysql_real_escape_string($_POST['ehBG']) . "', '" . 				mysql_real_escape_string($_POST['ehTextAlign']) . "', '" . 
			mysql_real_escape_string($_POST['ehTextColor']) . "', '" . 			mysql_real_escape_string($_POST['ehLinkColor']) . "', '" . 
			mysql_real_escape_string($_POST['ehLinkHoverColor']) . "', '" . 	mysql_real_escape_string($_POST['ehVisitedLinkColor']) . "', '" . 
			mysql_real_escape_string($_POST['ebMinHeight']). "', '" . 			mysql_real_escape_string($_POST['ebBG']) . "', '" . 
			mysql_real_escape_string($_POST['ebTextAlign']) . "', '" . 			mysql_real_escape_string($_POST['ebTextColor']) . "', '" . 
			mysql_real_escape_string($_POST['ebLinkColor']) . "', '" . 			mysql_real_escape_string($_POST['ebLinkHoverColor']) . "', '" . 
			mysql_real_escape_string($_POST['ebVisitedLinkColor']) . "', '" . 	mysql_real_escape_string($_POST['efMinHeight']) . "', '" . 
			mysql_real_escape_string($_POST['efBG']) . "', '" . 				mysql_real_escape_string($_POST['efTextAlign']) . "', '" . 
			mysql_real_escape_string($_POST['efTextColor']) . "', '" . 			mysql_real_escape_string($_POST['efLinkColor']) . "', '" . 
			mysql_real_escape_string($_POST['efLinkHoverColor']) . "', '" .  	mysql_real_escape_string($_POST['efVisitedLinkColor']) . "')");
			
		$result = mysql_query($query);
		if ($result) {
			echo "<center>The color theme was created</center>";
		} else {
			die("Failed to create the color theme: " . mysql_error());
		}
		
	} else {
?>
		<center>
			<form name="createTheme" action="?mainCategory=createTheme" method="post">
				<table>
					<tr><td colspan="2"><b>Overall</b></td></tr>
					<tr><td>Name</td><td><input class="form" type="text" name="name" value="" /></td></tr>
					<tr><td>Margin Left</td><td><input class="form" type="text" name="marginLeft" value="" /></td></tr>
					<tr><td>Margin Right</td><td><input class="form" type="text" name="marginRight" value="" /></td></tr>
					<tr><td>Page Width</td><td><input class="form" type="text" name="pageWidth" value="" /></td></tr>
					<tr><td>Font Family</td><td><input class="form" type="text" name="fontFamily" value="" /></td></tr>
					<tr><td>Border</td><td><input class="form" type="text" name="border" value="" /></td></tr>
					<tr><td>Header Image SRC</td><td><input class="form" type="text" name="headerImageSRC" value="" /></td></tr>

					<tr><td colspan="2"><b>Body</b></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="bBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="bTextAlign" value="" /></td></tr>
					
					<tr><td colspan="2"><b>Header</b></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="hBG" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="hTextAlign" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="hTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="hLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="hLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="hVisitedLinkColor" value="" /></td></tr>

					<tr><td colspan="2"><b>Data</b></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="dBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="dTextAlign" value="" /></td></tr>
					<tr><td>Padding</td><td><input class="form" type="text" name="dPadding" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="dTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="dLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="dLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="dVisitedLinkColor" value="" /></td></tr>

					<tr><td colspan="2"><b>Footer</b></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="fBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="fTextAlign" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="fTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="fLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="fLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="fVisitedLinkColor" value="" /></td></tr>

					<tr><td colspan="2"><b>Element</b></td></tr>
					<tr><td>Element Width</td><td><input class="form" type="text" name="elementWidth" value="" /></td></tr>
					<tr><td>Element Border</td><td><input class="form" type="text" name="elementBorder" value="" /></td></tr>
					<tr><td colspan="2"><b>Element Header</b></td></tr>
					<tr><td>Minimum Height</td><td><input class="form" type="text" name="ehMinHeight" value="" /></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="ehBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="ehTextAlign" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="ehTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="ehLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="ehLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="ehVisitedLinkColor" value="" /></td></tr>
					<tr><td colspan="2"><b>Element Body</b></td></tr>
					<tr><td>Minimum Height</td><td><input class="form" type="text" name="ebMinHeight" value="" /></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="ebBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="ebTextAlign" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="ebTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="ebLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="ebLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="ebVisitedLinkColor" value="" /></td></tr>
					<tr><td colspan="2"><b>Element Footer</b></td></tr>
					<tr><td>Minimum Height</td><td><input class="form" type="text" name="efMinHeight" value="" /></td></tr>
					<tr><td>Background</td><td><input class="form" type="text" name="efBG" value="" /></td></tr>
					<tr><td>Text Align</td><td><input class="form" type="text" name="efTextAlign" value="" /></td></tr>
					<tr><td>Text Color</td><td><input class="form" type="text" name="efTextColor" value="" /></td></tr>
					<tr><td>Link Color</td><td><input class="form" type="text" name="efLinkColor" value="" /></td></tr>
					<tr><td>Link Hover Color</td><td><input class="form" type="text" name="efLinkHoverColor" value="" /></td></tr>
					<tr><td>Visited Link Color</td><td><input class="form" type="text" name="efVisitedLinkColor" value="" /></td></tr>
					<tr><td colspan="2"><input class="form" type="hidden" name="submitted" value="1" /><br /><input class="form" type="submit" value="Submit" /></td></tr>
				</table>
			</form>
		</center>
<?php 
	}
?>
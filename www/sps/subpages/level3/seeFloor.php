<!-- This will display a box containing the end point device list for a given floor -->
<div id="elementFixed">
	<div id="elementHead">
		<span><?php echo "End Point Device List on " . $_POST['floorName'] . " in " . $_POST['schoolName']; ?></span>
	</div>
	<div id="elementBody">
		<?php $fields = getEPDFields(); ?>
		<table border=1>
			<tr>
				<th colspan="2">
					<form id="smallForm" action="<?php echo $homeDir; ?>" method="post">
						<input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />
						<input type="hidden" name="floorName" value="<?php echo $_POST['floorName']; ?>" />
						<input type="hidden" name="seeEPDList" value="1" />
						<input type="hidden" name="seeEPD" value="1" />
						<input id="createButtonMed2" type="submit" name="createEPD" value="Create New Entry" />
					</form>
				</th>
				<?php for ($i = 1; $i <= $fields[0]; $i++) {
					echo "<th id='text'>" . $fields[$i] . "</th>";
				} ?>
			</tr>
				
			<?php $query = sprintf("SELECT * FROM endpointdevices WHERE ( School = '" . $_POST['schoolName'] . "' AND Floor = '" . $_POST['floorName'] . "' )");
			$result = mysql_query($query);
			while ($row = mysql_fetch_assoc($result)) {?>
				<tr>
					<td>
						<form id="smallForm" action="<?php echo $homeDir; ?>" method="post">
							<input id="buttonSmall" type="submit" name="goToCloset" value="Closet" />
							<input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />
							<input type="hidden" name="seeCD" value="1" />	
							<input type="hidden" name="seeCDList" value="1" />
							<input type="hidden" name="closetName" value="<?php echo "Closet " . $row['Closet']; ?>" />
						</form>
					</td>
					<td>
						<form id="smallForm" action="<?php echo $homeDir; ?>" method="post">
							<input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />
							<input type="hidden" name="floorName" value="<?php echo $_POST['floorName']; ?>" />
							<input type="hidden" name="seeEPDList" value="1" />
							<input type="hidden" name="seeEPD" value="1" />	
<!--						<input id="createButtonSmall" type="submit" name="editEPD" value="Edit" />   -->
<!--						<input id="destroyButtonSmall" type="submit" name="removeEPD" value="Remove" />  -->
						</form>
					</td>
					<?php for ($i = 1; $i <= $fields[0]; $i++) {
						echo "<td id='text'>" . $row[$fields[$i]] . "</td>";
					} ?>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
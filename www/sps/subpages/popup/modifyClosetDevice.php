<div id="popup-wrapper">
	<div id="popup">
		<div id="scrollable">
			<?php if (isset($_POST['createCD'])) { ?>
				<?php $fields = getCDFields(); ?>
				<form id="popupForm" action="<?php echo $homeDir; ?>" method="post">
					<table>
						<tr>
							<th colspan="2" id="specialTD">
								Create New Closet Device At <?php echo $_POST['schoolName']; ?>
							</th>
						</tr>	
						<tr>
							<th>
								Name
							</th>
							<th>
								<input id="text" type="text" name="name" value="" onClick="javascript: this.select();" />
							</th>
						</tr>	
						<tr>
							<th>
								ParentName
							</th>
							<th>
								<?php getParentDD($_POST['schoolName'],"CD"); ?>
							</th>
						</tr>	
						<tr>
							<th>
								Equipment
							</th>
							<th>
								<?php getCDEquipmentDD(); ?>
							</th>
						</tr>
						<?php for ($i = 5; $i <= $fields[0]; $i++) {
							echo "<tr><td>" . $fields[$i] . "</td><td><input id='text' type='text' name='" . $fields[$i] . "' value='' onClick='javascript: this.select();' /></td></tr>";
						} ?>	
						<tr>
							<td colspan="2" id="specialTD">
								<input id="createButton" type="submit" name="doCreateCD" value="Create Closet Device" />
							</td>
						</tr>
						<tr>
							<td colspan="2" id="specialTD">
								<input id="button" type="submit" name="cancel" value="Cancel" />
								<input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />
								<input type="hidden" name="closetName" value="<?php echo $_POST['closetName']; ?>" />
								<input type="hidden" name="seeCD" value="1" />												
								<input type="hidden" name="seeCDList" value="1" />		
							</td>
						</tr>
					</table>									
				</form>
			<?php } else if (isset($_POST['editCD'])) { ?>
				<form id="popupForm" action="<?php echo $homeDir; ?>" method="post">
					<table>
						<tr><td colspan="2" id="specialTD">Edit Closet Device \Name/																	</td></tr>
						<?php for ($i = 0; $i < $numFields; $i++) {
							echo "<tr><td>" . $fields[$i] . "</td><td><input id='text' type='text' name='" . $fields[$i] . "' value='' onClick='javascript: this.select();' /></td></tr>";
						} ?>	
						<tr>
							<td colspan="2" id="specialTD">
								<input id="createButton" type="submit" name="doEditCD" value="Update Closet Device" />
							</td>
						</tr>
						<tr>
							<td colspan="2" id="specialTD">
								<input id="button" type="submit" name="cancel" value="Cancel" />
								<input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />
								<input type="hidden" name="closetName" value="<?php echo $_POST['closetName']; ?>" />
						<input type="hidden" name="seeCD" value="1" />												
						<input type="hidden" name="seeCDList" value="1" />		
							</td>
						</tr>
					</table>									
				</form>
			<?php } else if (isset($_POST['removeCD'])) { ?>
				<form id="popupForm" action="<?php echo $homeDir; ?>" method="post">
					<ul>
						<li>Are you sure you want to remove this closet device?										</li>
						<li><input id="destroyButton" type="submit" name="doRemoveCD" value="Yes" />				</li>
						<li><input id="button" type="submit" name="cancel" value="No" />							</li>
						<li><input type="hidden" name="schoolName" value="<?php echo $_POST['schoolName']; ?>" />	</li>
						<li><input type="hidden" name="closetName" value="<?php echo $_POST['closetName']; ?>" />	</li>
						<li><input type="hidden" name="seeCD" value="1" />											</li>
						<li><input type="hidden" name="seeCDList" value="1" />										</li>
					</ul>
				</form>
			<?php } ?>
		</div>
	</div>
</div>
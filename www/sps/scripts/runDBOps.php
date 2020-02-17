<?php 
	//Modify School
	if (isset($_POST['doCreateSchool'])) {
		doCreateSchool();
	} 
	if (isset($_POST['doEditSchool'])) {
		doEditSchool();
	} 
	if (isset($_POST['doRemoveSchool'])) {
		doRemoveSchool();
	}
	
	//Modify Closet
	if (isset($_POST['doCreateCloset'])) {
		doCreateCloset();
	} 
	
	//Modify Floor
	if (isset($_POST['doCreateFloor'])) {
		doCreateFloor();
	} 
	
	//Modify End Point Devices
	if (isset($_POST['doCreateEPD'])) {
		doCreateEPD();
	} 
	
	//Modify Closet Devices
	if (isset($_POST['doCreateCD'])) {
		doCreateCD();
	} 
?>
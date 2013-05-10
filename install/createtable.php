<?php
	require_once("connectdb.php");

	// Create database
	$sql="CREATE TABLE users(ID CHAR(30) PRIMARY KEY, STUDENT_ID CHAR(30), SOCIAL_ID CHAR(30), NAME CHAR(30), EMAIL CHAR(100), BIRTH DATETIME, APPLICATION DATETIME)";

	if (mysqli_query($con,$sql)){
		echo "Table users created successfully";
	}else{
		echo "Error creating table: " . mysqli_error($con);
	}
?>

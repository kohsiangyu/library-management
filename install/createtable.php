<?php
	require_once("connectdb.php");

	// Create database
	$sql="CREATE DATABASE libmanage";

	if (mysqli_query($con,$sql)){
		echo "Database my_db created successfully";
	}else{
		echo "Error creating database: " . mysqli_error($con);
	}
?>

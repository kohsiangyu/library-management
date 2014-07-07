<?php
	require_once("connectmysql.php");
	require_once("create_script.php");

	// Create database
	$sql=$newdb;

	if (mysqli_query($con,$sql)){
		echo "Database my_db created successfully";
	}else{
		echo "Error creating database: " . mysqli_error($con);
	}
?>

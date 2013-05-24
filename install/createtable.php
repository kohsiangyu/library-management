<?php
	require_once("connectdb.php");
	require_once("create_script.php");

	// Create database
	$sql=$newtable[2];

	if (mysqli_query($con,$sql)){
		echo "Table users created successfully";
	}else{
		echo "Error creating table: " . mysqli_error($con);
	}
?>

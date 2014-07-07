<?php
	require_once("dbroot.php");

	// Mysql connection
	$con=mysqli_connect($dbserver, $dbadmin, $dbpasswd);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Create database
	$newdb		= "CREATE DATABASE ".$dbname;
	if (mysqli_query($con,$newdb)){
		echo "Database my_db created successfully\n";
	}else{
		echo "Error creating database: " . mysqli_error($con) . "\n";
	}
?>

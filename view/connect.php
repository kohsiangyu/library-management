<?php
	require_once("../install/dbinfo.php");

	function connect(){
		global $dbserver, $dbadmin, $dbpasswd, $dbname;

		$con=mysqli_connect($dbserver, $dbadmin, $dbpasswd, $dbname);

		// Check connection
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		return $con;
	}
?>

<?php
	require_once("connectdb.php");
	require_once("create_script.php");

	function createTable($con, $sql, $tablename){
		// Create table
		if (mysqli_query($con,$sql)){
			echo "Table $tablename created successfully\n";
		}else{
			echo "Error creating table($tablename): " . mysqli_error($con) . "\n";
		}
	}

	for($i=0;$i<count($tfName);$i++){
		createTable($con, $newtable[$i], $tablename[$i]);
	}
?>

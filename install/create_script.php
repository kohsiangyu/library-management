<?php
	require_once("dbinfo.php");


	for($i=0;$i<count($tablefields);$i++){
		$newtable[$i]	= "CREATE TABLE $tablename[$i]($tablefields[$i])";
	}
	// echo json_encode($newtable)."<br/>";
?>

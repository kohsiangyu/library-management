<?php
	require_once("dbinfo.php");

	$newdb		= "CREATE DATABASE ".$dbname;
	$newtable	= "CREATE TABLE $tablename[0]($tablefields[0])";
	// echo json_encode($newtable)."<br/>";
?>

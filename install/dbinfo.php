<?php
	/**********     Database Information     **********/
	$dbserver		= "localhost";
	$dbadmin		= "libmanager";
	$dbpasswd		= "pFJpjtbc7FWFaAYn";
	$dbname			= "libmanage";

	/**********      Table Informations      **********/
	$tablename[0]	= "users";
	$tablename[1]	= "books";
	$tablename[2]	= "records";


	/**********  Table('users') Information  **********/
	$tfName[0] = array(		"ID",
							"TYPE",
							"STUDENT_ID",
							"SOCIAL_ID",
							"NAME",
							"PASSWORD",
							"EMAIL",
							"BIRTH",
							"APPLICATION"
						);

	$tfType[0] = array(		"CHAR(30) PRIMARY KEY, ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(100), ",
							"DATETIME, ",
							"DATETIME"
						);
	// echo json_encode(count($tfType[0]))."<br/>";


	/**********  Table('books') Information  **********/


	/********** Table('records') Information **********/


	for($j=0;$j<count($tfName[0]);$j++){
		$tablefields[0] = $tablefields[0].$tfName[0][$j]." ".$tfType[0][$j];
	}
	// echo json_encode($tablefields[0])."<br/>";
?>

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
	// Table Field Name
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

	// Table Field Type
	$tfType[0] = array(		"CHAR(30) PRIMARY KEY, ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"CHAR(100), ",
							"DATE, ",
							"DATETIME"
						);
	// echo json_encode(count($tfType[0]))."<br/>";


	/**********  Table('books') Information  **********/
	$tfName[1] = array(		"ID",			// Identity
							"LOCATION",
							"FLOOR",
							"SHELF",
							"NAME",
							"PUBLISHER",
							"ISBN",
							"STOCKDATE",
							"OUTDATE",
							"EXPIRE",
							"STATUS"
						);

	$tfType[1] = array(		"CHAR(30) PRIMARY KEY, ",
							"CHAR(100), ",
							"FLOAT, ",
							"CHAR(30), ",
							"CHAR(100), ",
							"CHAR(30), ",
							"CHAR(30), ",
							"DATE, ",
							"DATE, ",
							"INT, ",
							"CHAR(30)"
						);


	/********** Table('records') Information **********/
	$tfName[2] = array(		""
						);

	$tfType[2] = array(		""
						);


	/**********  **********/
	for($i=0;$i<count($tfName);$i++){
		$tablefields[$i] = "";
		for($j=0;$j<count($tfName[$i]);$j++){
			$tablefields[$i] = $tablefields[$i].$tfName[$i][$j]." ".$tfType[$i][$j];
		}
	}
	// echo json_encode($tablefields)."<br/>";
?>

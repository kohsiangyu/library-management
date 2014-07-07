<?php
	require_once("examine.php");

	chkAccessibility();

	require_once("connect.php");

	function setting($usage, $argv = array(), $type = "sqli"){
		global $tablename;

		switch($usage){
			case "addNewBook":
				$bookID		= "\"".$argv['bookID']."\"";
				$name		= "\"".$argv['name']."\"";
				$publisher	= "\"".$argv['publisher']."\"";
				$stockdate	= "\"".$argv['stockdate']."\"";
				$sql = "insert into $tablename[1] (ID, NAME, PUBLISHER, STOCKDATE) ".
					"values ($bookID, $name, $publisher, $stockdate)";
				break;
			case "addWebToRead":
				$url		= "\"".$argv['url']."\"";
				$description= "\"".$argv['description']."\"";
				$date		= "\"".$argv['date']."\"";
				$status		= "\"".$argv['status']."\"";
				$sql="insert into $tablename[3] (url, description, date, status) ".
					"values ($url, $description, $date, $status)";
				break;
			case "addNewRecord":
				$bookID		= "\"".$argv['bookID']."\"";
				$userID		= "\"".$argv['userID']."\"";
				$date		= "\"".$argv['date']."\"";
				$sql="insert into $tablename[2] (BOOK_ID, USER_ID, EXPIRE) ".
					"values ($bookID, $userID, $date)";
				break;
		}

		settingSQLI($sql);
		//if($_POST['sendnewbook']=="send"){
		//	nbMail($_POST['NAME']);
		//}
	}

	function settingSQLI($script){
		// Initialize connection to mysql
		$con = connect();

		mysqli_query($con, "SET NAMES utf8");
		mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
		mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");
		if($result = mysqli_query($con,$script)){
			// var_dump($result);
			$finalResult['status']	= "success";
			echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			$finalResult['status']			= "fail";
			$finalResult['status-detail']	= "Unable to do the query.";
			echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);
			return;
		}

		// Destroy coonection to mysql
		mysqli_close($con);
	}
?>

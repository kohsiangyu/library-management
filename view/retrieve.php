<?php
	require_once("examine.php");

	chkAccessibility();

	require_once("connect.php");

	function retrieve($usage, $argv = array(), $type = "sqli"){
		global $tablename;

		switch($usage){
			case "getWebsToRead":
				$sql = "select * from $tablename[3] order by date desc";
				break;
			case "getBooks":
				$sql = "select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1]";
				break;
			case "getBooksByCategory":
				$publisher = "\"".$argv['publisher']."\"";
				$sql = "select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1]".
						" where PUBLISHER=$publisher";
				break;
			case "getPersonalInfo":
				$userID = "\"".$argv['userID']."\"";
				$sql="select * from users where ID=$userID";
				break;
			case "getBorrows":
				$userID = "\"".$argv['userID']."\"";
				$sql="select BOOK_ID, EXPIRE from $tablename[2] where USER_ID=$userID";
				break;
			case "getSearch":
				$bookName = "\"".$argv['bookName']."\"";
				$sql="select * from ".$tablename[1]." where NAME=$bookName";
				break;
		}

		retrieveSQLI($sql);
	}

	function retrieveSQLI($script){
		// Initialize connection to mysql
		$con = connect();

		mysqli_query($con, "SET NAMES utf8");
		mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
		mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");
		if($result = mysqli_query($con,$script)){
			// var_dump($result);
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			$finalResult['status']			= "fail";
			$finalResult['status-detail']	= "Unable to do the query.";
			echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);
			return;
		}

		$i = 0;
		$temp="";
		while($row = mysqli_fetch_array($result)){
			$temp[$i] = $row;
			$i++;
		}

		if($i == 0){
			$finalResult['status']			= "fail";
			$finalResult['status-detail']	= "Unable to do the query.";
			echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);
			return;
		}

		$finalResult['status']	= "success";
		$finalResult['data']	= $temp;
		echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);

		// Destroy coonection to mysql
		mysqli_close($con);
	}
?>

<?php
	require_once("examine.php");

	chkAccessibility();

	require_once("connect.php");

	function remove($usage, $argv = array(), $type = "sqli"){
		global $tablename;

		switch($usage){
			case "getBookDelete":
				$bookID = "\"".$argv['bookID']."\"";
				$sql = "delete from $tablename[1] where ID=$bookID";
				break;
			case "removeRecord":
				$bookID = "\"".$argv['bookID']."\"";
				$sql = "delete from $tablename[2] where BOOK_ID=$bookID";
				break;
		}

		removeSQLI($sql);
	}

	function removeSQLI($script){
		// Initialize connection to mysql
		$con = connect();

		mysqli_query($con, "SET NAMES utf8");
		mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
		mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");
		if($result = mysqli_query($con,$script)){
			$finalResult['status']	= "success";
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			$finalResult['status']			= "fail";
			$finalResult['status-detail']	= "Unable to do the query.";
			echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);
			return;
		}

		echo json_encode($finalResult, JSON_UNESCAPED_UNICODE);

		// Destroy coonection to mysql
		mysqli_close($con);
	}
?>

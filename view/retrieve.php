<?php
	require_once("examine.php");

	chkAccessibility();

	require_once("connect.php");

	function retrieve($usage, $argv, $type = "sqli"){
		global $tablename;

		if($usage == "getWebsToRead"){
			$sql = "select * from $tablename[3] order by date desc";
		}else if($usage == "getBooks"){
			$sql = "select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1]";
		}else if($usage == "getBooksByCategory"){
			$publisher = "\"".$argv['publisher']."\"";
			$sql = "select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1]".
					" where PUBLISHER=$publisher";
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

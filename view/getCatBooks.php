<?php
	session_start();	
	require_once("examine.php");

	$result = examine($_SESSION['user'], $_SESSION['pass']);
	if(isset($result)){
		$_SESSION['ID'] = $result['ID'];
		unset($result);
	}else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		return;
	}

	require_once("connect.php");

	// Initialize connection to mysql
	$con = connect();

	$sql="select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1] where PUBLISHER=\"".$_POST['PUBLISHER']."\"";

	mysqli_query($con, "SET NAMES utf8");
	mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
	mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");
	if($result = mysqli_query($con,$sql)){
		// print_r($result);echo "<br/>";
		// var_dump($result);
	}else{
		// echo "Nothing found : " . mysqli_error($con);
		return;
	}

	$i = 0;
	$temp="";
	while($row = mysqli_fetch_array($result)){
		$temp[$i] = $row;
		$i++;
		// echo json_encode($row);
	}

	if($i == 0) return;

	echo json_encode($temp, JSON_UNESCAPED_UNICODE);

	// Destroy coonection to mysql
	mysqli_close($con);
?>

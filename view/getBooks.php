<?php
	require_once("connect.php");

	session_start();
	$id = $_SESSION['ID'];

	// Initialize connection to mysql
	$con = connect();

	$sql="select ID, NAME, PUBLISHER, STOCKDATE from $tablename[1]";

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

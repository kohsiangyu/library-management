<?php
	require_once("connect.php");

	session_start();
	$id = $_SESSION['ID'];

	// Initialize connection to mysql
	$con = connect();

	$sql="insert into $tablename[1] (ID, NAME, PUBLISHER, STOCKDATE) values (\"".
		$_POST['ID']."\", \"".$_POST['NAME']."\", \"".$_POST['PUBLISHER']."\", \"".$_POST['STOCKDATE']."\")";
	// echo json_encode($sql);

	mysqli_query($con, "SET NAMES utf8");
	mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
	mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");

	if($result = mysqli_query($con,$sql)){
		// print_r($result);echo "<br/>";
		// var_dump($result);
		echo json_encode("success");
	}else{
		// echo "Nothing found : " . mysqli_error($con);
		echo json_encode("failure");
	}

	// Destroy coonection to mysql
	mysqli_close($con);
?>

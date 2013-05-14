<?php
	require_once("connect.php");

	session_start();
	$id = $_SESSION['ID'];

	// Initialize connection to mysql
	$con = connect();

	$sql="select * from users where ID=\"$id\"";

	if($result = mysqli_query($con,$sql)){
		// print_r($result);echo "<br/>";
		// var_dump($result);
	}else{
		// echo "Nothing found : " . mysqli_error($con);
		return;
	}

	if($row = mysqli_fetch_array($result)){
		echo json_encode($row);
	}else{
		return;
	}

	// Destroy coonection to mysql
	mysqli_close($con);
?>

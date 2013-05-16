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

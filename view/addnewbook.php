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
	require_once("mail.php");

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
		//nbMail("kohsiangyu@gmail.com", $_POST['NAME']);
		// alert($_POST['sendnewmail']);
		if($_POST['sendnewbook']=="send"){
			nbMail($_POST['NAME']);
		}
		echo json_encode("success");
	}else{
		// echo "Nothing found : " . mysqli_error($con);
		echo json_encode("failure");
	}

	// Destroy coonection to mysql
	mysqli_close($con);
?>

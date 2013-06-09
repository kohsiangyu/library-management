<?php
	require_once("connect.php");

	function examine($user, $pass){
		// Initialize connection to mysql
		$con = connect();

		$sql="select ID from users where NAME=\"$user\" and PASSWORD=\"$pass\"";

		if($result = mysqli_query($con,$sql)){
			// print_r($result);echo "<br/>";
			// var_dump($result);
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			// return "error";
			return;
		}

		if($row = mysqli_fetch_array($result)){
			// echo json_encode($row)."<br/>";
		}else{
			// return "not found";
			return;
		}

		// Destroy coonection to mysql
		mysqli_close($con);

		return $row;
	}

	function chkAccessibility($redirectPage = "login.php"){
		if (!isset($_SESSION)) session_start();
		$result = examine($_SESSION['user'], $_SESSION['pass']);
		if(isset($result)){
			$_SESSION['ID'] = $result['ID'];
			unset($result);
			return true;
		}else{
			echo "<meta http-equiv='refresh' content='0;url=$redirectPage'>";
			return false;
		}
		session_write_close();
	}
?>

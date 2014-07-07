<?php
	require_once("connect.php");

	function chkpass($id, $privilege){
		// Initialize connection to mysql
		$con = connect();

		$sql="select * from users where ID=\"$id\" and TYPE=\"$privilege\"";

		if($result = mysqli_query($con,$sql)){
			// print_r($result);echo "<br/>";
			// var_dump($result);
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			// return "error";
			return false;
		}

		if($row = mysqli_fetch_array($result)){
			// echo json_encode($row)."<br/>";
		}else{
			// return "not found";
			return false;
		}

		// Destroy coonection to mysql
		mysqli_close($con);

		return true;
	}
?>

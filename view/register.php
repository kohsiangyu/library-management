<?php
	require_once("connect.php");

// echo "test";
// echo json_encode($_POST);
	register();

	function register(){
		global $tablename;

		// Initialize connection to mysql
		$con = connect();

		$br = "\", \"";
		$newUser = "\"".rand().$br.
					"guest".$br.
					$_POST['STUDENT_ID'].$br.
					$_POST['SOCIAL_ID'].$br.
					$_POST['NAME'].$br.
					$_POST['PASS'].$br.
					$_POST['EMAIL'].$br.
					$_POST['BIRTH'].$br.
					date("Y-m-d H:i:s", time())."\"";

		$sql = "insert into $tablename[0] value($newUser)";

		if($result = mysqli_query($con,$sql)){
			mysqli_close($con);
			return "success";
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			// return "error";
			return;
		}

		// Destroy coonection to mysql
		mysqli_close($con);

		return "failure";
	}

	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>

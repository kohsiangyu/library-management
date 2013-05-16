<?php
	require_once("connect.php");

	function getusermail(){
		// Initialize connection to mysql
		$con = connect();

		$sql="select EMAIL from users";

		mysqli_query($con, "SET NAMES utf8");
		mysqli_query($con, "SET CHARACTER_SET_CLIENT=utf8");
		mysqli_query($con, "SET CHARACTER_SET_RESULTS=utf8");
		if($result = mysqli_query($con,$sql)){
			// print_r($result);echo "<br/>";
			// var_dump($result);
		}else{
			// echo "Nothing found : " . mysqli_error($con);
			return "failure";
		}

		$i = 0;
		$temp="";
		while($row = mysqli_fetch_array($result)){
			$temp[$i] = $row;
			$i++;
			// echo json_encode($row);
		}

		if($i == 0) return "failure";

		// echo json_encode($temp, JSON_UNESCAPED_UNICODE);

		// Destroy coonection to mysql
		mysqli_close($con);

		return $temp;
	}

	function nbMail($book){ // New incoming book mail
		$subject = "PolarLib! New books available";
		$message = "There is a new book \"$book\" avaliable rightnow, take time to visit us";
		$from = "someonelse@example.com";
		$headers = "From:" . $from;
		$result = getusermail();

		if(isset($result) && ($result!="failure")){
			for($i=0;$i<count($result);$i++){
				$to = $result[$i]['EMAIL'];
				mail($to,$subject,$message,$headers);
			}
		}else{
			return false;
		}
		return true;
		// echo "Mail Sent.";
	}
?>

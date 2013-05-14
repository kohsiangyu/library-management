<?php
	session_start();

	//unset($_POST['username']);
	//unset($_POST['password']);
	echo $_SESSION['user']."<br/>";
	echo $_SESSION['pass']."<br/>";

	session_destroy();

	echo "<meta http-equiv=REFRESH content=5;url=login.php>"
?>

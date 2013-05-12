<?php
	session_start();

	unset($_POST['username']);
	unset($_POST['password']);

	session_destroy();

	echo "<meta http-equiv=REFRESH content=1;url=login.php>"
?>

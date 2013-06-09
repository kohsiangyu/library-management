<?php
	require_once("examine.php");
	require_once("retrieve.php");

	if(chkAccessibility() == true){
		retrieve("getBooksByCategory",array("publisher" => $_POST['PUBLISHER']));
	}
?>

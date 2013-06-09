<?php
	require_once("examine.php");
	require_once("retrieve.php");

	if(chkAccessibility() == true){
		switch($_POST['action']){
			case "getBooks":
				retrieve("getBooks");
				break;
			case "getBooksByCategory":
				retrieve("");
				break;
			case "getBorrows":
				session_start();
				retrieve("getBorrows",array("userID" => $_SESSION['ID']));
				session_write_close();
				break;
			case "getPersonalInfo":
				session_start();
				retrieve("getPersonalInfo",array("userID" => $_SESSION['ID']));
				session_write_close();
				break;
			case "getWebsToRead":
				retrieve("getWebsToRead");
				break;
		}
	}
?>

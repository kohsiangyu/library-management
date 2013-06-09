<?php
	require_once("examine.php");
	require_once("retrieve.php");
	require_once("setting.php");

	if(chkAccessibility() == true){
		switch($_POST['action']){
			case "getBooks":
				retrieve("getBooks");
				break;
			case "getBooksByCategory":
				retrieve("getBooksByCategory",array("publisher" => $_POST['PUBLISHER']));
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
			case "getSearch":
				retrieve("getSearch",array("bookName" => $_POST['search']));
				break;
			case "addNewBook":
				$argv = array("bookID" => $_POST['ID'],
								"name" => $_POST['NAME'],
								"publisher" => $_POST['PUBLISHER'],
								"stockdate" => $_POST['STOCKDATE']
						);
				setting("addNewBook", $argv);
				break;
			case "addWebToRead":
				$argv = array("url" => $_POST['url'],
								"description" => $_POST['description'],
								"date" => date("Y-m-d H:i:s", time()),
								"status" => "pending"
						);
				setting("addWebToRead", $argv);
				break;
			case "addNewRecord":
				session_start();
				$argv = array("bookID" => $_POST['ID'],
								"userID" => $_SESSION['ID'],
								"date" => date("Y-m-d H:i:s", time()+18*24*60*60)
						);
				session_write_close();
				setting("addNewRecord", $argv);
				break;
		}
	}
?>

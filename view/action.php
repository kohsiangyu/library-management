<?php
	require_once("examine.php");
	require_once("retrieve.php");
	require_once("setting.php");
	require_once("remove.php");

	if (!isset($_SESSION)) session_start();

	if(chkAccessibility() == true){
		switch($_POST['action']){
			case "getBooks":
				retrieve("getBooks");
				break;
			case "getBooksByCategory":
				retrieve("getBooksByCategory",array("publisher" => $_POST['PUBLISHER']));
				break;
			case "getBorrows":
				retrieve("getBorrows",array("userID" => $_SESSION['ID']));
				break;
			case "getPersonalInfo":
				retrieve("getPersonalInfo",array("userID" => $_SESSION['ID']));
				break;
			case "getWebsToRead":
				$argv = array();
				retrieve($_POST['action'], $argv);
				break;
			case "getSearch":
				$argv = array("bookName" => $_POST['search']);
				retrieve($_POST['action'], $argv);
				break;
			case "addNewBook":
				$argv = array("bookID" => $_POST['ID'],
								"name" => $_POST['NAME'],
								"publisher" => $_POST['PUBLISHER'],
								"stockdate" => $_POST['STOCKDATE']
						);
				setting($_POST['action'], $argv);
				break;
			case "addWebToRead":
				$argv = array("url" => $_POST['url'],
								"description" => $_POST['description'],
								"date" => date("Y-m-d H:i:s", time()),
								"status" => "pending"
						);
				setting($_POST['action'], $argv);
				break;
			case "addNewRecord":
				$argv = array("bookID" => $_POST['ID'],
								"userID" => $_SESSION['ID'],
								"date" => date("Y-m-d H:i:s", time()+18*24*60*60)
						);
				setting($_POST['action'], $argv);
				break;
			case "getBookDelete":
				$argv = array("bookID" => $_POST['bookID']);
				remove($_POST['action'], $argv);
				break;
			case "removeRecord":
				$argv = array("bookID" => $_POST['bookID']);
				remove($_POST['action'], $argv);
				break;
		}
	}

	session_write_close();
?>

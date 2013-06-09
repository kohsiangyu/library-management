<?php
	require_once("examine.php");

	chkAccessibility();

	require_once("connect.php");

	require_once("retrieve.php");

	retrieve("getWebsToRead");
?>

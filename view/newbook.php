<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd ">
<?php
	session_start();	
	require_once("examine.php");

	$result = examine($_SESSION['user'], $_SESSION['pass']);
	if(isset($result)){
		$_SESSION['ID'] = $result['ID'];
		unset($result);
	}else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		return;
	}
?>
<html xmlns=" http://www.w3.org/1999/xhtml ">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php require_once("skin.php"); ?>
		<script src="./js/json-newBook.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
						<!-- New Book
						=============================================================== -->
							<form class="form-horizontal" id="newbookform">
								<fieldset>
									<div id="legend">
										<legend class="">Share something new ?</legend>
									</div>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="ID">館藏編號</label>
										<div class="controls">
											<input type="text" id="ID" name="ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Name -->
										<label class="control-label"  for="NAME">書名</label>
										<div class="controls">
											<input type="text" id="NAME" name="NAME" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Publisher -->
										<label class="control-label"  for="PUBLISHER">出版商</label>
										<div class="controls">
											<input type="text" id="PUBLISHER" name="PUBLISHER" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Stock Date -->
										<label class="control-label"  for="STOCKDATE">蒐錄日期</label>
										<div class="controls">
											<input type="date" id="STOCKDATE" name="STOCKDATE" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Push Data -->
										<div class="controls">
											<label class="checkbox"><input type="checkbox" name="sendnewbook" value="send" checked> Send Info Mail</label>
											<input type="hidden" id="action" name="action" value="addNewBook">
											<button id="submit" name="submit" placeholder="" class="btn btn-primary">New</button>
											<button id="clear" name="clear" placeholder="" class="btn btn-danger">Clear</button>
										</div>
									</div>
								</fieldset>
							</form>
	</body>
</html>


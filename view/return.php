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
		<script src="./js/json-return.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
						<!-- New Book
						=============================================================== -->
							<form class="form-horizontal" id="removerecordform">
								<fieldset>
									<div id="legend">
										<legend class="">Share something new ?</legend>
									</div>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="ID">Book ID</label>
										<div class="controls">
											<input type="text" id="ID" name="ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Push Data -->
										<div class="controls">
											<button id="submit" name="submit" placeholder="" class="btn btn-primary">New</button>
										</div>
									</div>
								</fieldset>
							</form>
	</body>
</html>

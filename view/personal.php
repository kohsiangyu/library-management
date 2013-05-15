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
		<script src="./js/json-getPersonal.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
						<!-- Personal Info
						=============================================================== -->
							<form class="form-horizontal">
								<fieldset>
									<div id="legend">
										<legend class="">Personal</legend>
									</div>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="ID">System Identification</label>
										<div class="controls">
											<input type="text" id="ID" name="ID" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- Type -->
										<label class="control-label"  for="TYPE">Privilige</label>
										<div class="controls">
											<input type="text" id="TYPE" name="TYPE" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- Student ID -->
										<label class="control-label"  for="STUDENT_ID">Student ID</label>
										<div class="controls">
											<input type="text" id="STUDENT_ID" name="STUDENT_ID" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- Social ID -->
										<label class="control-label"  for="SOCIAL_ID">Social ID</label>
										<div class="controls">
											<input type="text" id="SOCIAL_ID" name="SOCIAL_ID" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- Username -->
										<label class="control-label"  for="NAME">Username</label>
										<div class="controls">
											<input type="text" id="NAME" name="NAME" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- E-Mail -->
										<label class="control-label"  for="EMAIL">E-Mail</label>
										<div class="controls">
											<input type="text" id="EMAIL" name="EMAIL" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
									<div class="control-group">
										<!-- Birthday -->
										<label class="control-label"  for="BIRTH">Birthday</label>
										<div class="controls">
											<input type="text" id="BIRTH" name="BIRTH" placeholder="" class="input-xlarge" disabled>
										</div>
									</div>
								</fieldset>
							</form>
	</body>
</html>

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
		<script src="./js/json-getWebsToRead.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
						<!-- Books
						=============================================================== -->
							<div><caption><p class="text-center">Webs Pending To Read</p></caption></div>
							<form class="form-horizontal" id="bookform">
								<fieldset>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="PUBLISHER">PUBLISHER</label>
										<div class="controls">
											<select>
												<option>1</option>
											</select>
										</div>
									</div>
								</fieldset>
							</form>
							<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>#</th>
										<th>加入日期</th>
										<th>網址</th>
										<th>概要</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
	</body>
</html>

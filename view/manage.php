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

		<?php require_once("skin.php"); ?>
		<script src="json-getPersonal.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
		<!-- Navbar
		=============================================================== -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="./index.html">Bootstrap</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="">
								<a href="./index.html">Home</a>
							</li>
							<li class="">
								<a href="./getting-started.html">Get started</a>
							</li>
							<li class="active">
								<a href="./scaffolding.html">Scaffolding</a>
							</li>
							<li class="">
								<a href="./base-css.html">Base CSS</a>
							</li>
							<li class="">
								<a href="./components.html">Components</a>
							</li>
							<li class="">
								<a href="./javascript.html">JavaScript</a>
							</li>
							<li class="">
								<a href="./customize.html">Customize</a>
							</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>

		<div class="" id="loginModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Have an Account?</h3>
			</div>
			<div class="modal-body">
				<div class="">
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
						<li><a href="#create" data-toggle="tab">Books</a></li>
						<li><a href="#borrow" data-toggle="tab">Borrow</a></li>
						<li><a href="#create" data-toggle="tab">Books</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active in" id="personal">
							<form class="form-horizontal" action="" method="POST">
								<fieldset>
									<div id="legend">
										<legend class="">Personal</legend>
									</div>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="ID">System Identification</label>
										<div class="controls">
											<input type="text" id="ID" name="ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Type -->
										<label class="control-label"  for="TYPE">Privilige</label>
										<div class="controls">
											<input type="text" id="TYPE" name="TYPE" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Student ID -->
										<label class="control-label"  for="STUDENT_ID">Student ID</label>
										<div class="controls">
											<input type="text" id="STUDENT_ID" name="STUDENT_ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Social ID -->
										<label class="control-label"  for="SOCIAL_ID">Social ID</label>
										<div class="controls">
											<input type="text" id="SOCIAL_ID" name="SOCIAL_ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Username -->
										<label class="control-label"  for="NAME">Username</label>
										<div class="controls">
											<input type="text" id="NAME" name="NAME" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- E-Mail -->
										<label class="control-label"  for="EMAIL">E-Mail</label>
										<div class="controls">
											<input type="text" id="EMAIL" name="EMAIL" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Birthday -->
										<label class="control-label"  for="BIRTH">Birthday</label>
										<div class="controls">
											<input type="text" id="BIRTH" name="BIRTH" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Social ID -->
										<div class="controls">
											<button class="btn" id="getinfo">Get Data</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="tab-pane fade" id="create">
							<form id="tab">
								<label>Username</label>
								<input type="text" value="" class="input-xlarge">
								<label>First Name</label>
								<input type="text" value="" class="input-xlarge">
								<label>Last Name</label>
								<input type="text" value="" class="input-xlarge">
								<label>Email</label>
								<input type="text" value="" class="input-xlarge">
								<div>
									<button class="btn btn-primary">Create Account</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

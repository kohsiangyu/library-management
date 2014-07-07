<!DOCTYPE html>
<?php
	session_start(86400);

	if(isset($_POST['username']) && isset($_POST['password'])){
		$_SESSION['user']	= $_POST['username'];
		$_SESSION['pass']	= $_POST['password'];
		//unset($_POST['username']);
		//unset($_POST['password']);
		echo "<meta http-equiv='refresh' content='0;url=general.php'>";
	}
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php require_once("skin.php"); ?>
		<style>
			body{
				padding-top: 30px;
				background-image: url('./image/background_01.jpg');
			}
		</style>
		<!-- <script src="json-submit.js" type="text/javascript"></script> -->

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
		<div id="debug"></div>
		<div class="" id="ManageModal">
			<div class="container" style="max-width:600px" >
				<div class="well well-large">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
						<li><a href="#create" data-toggle="tab">Create Account</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active in" id="login">
							<form class="form-horizontal" action="login.php" method="POST">
								<fieldset>
									<div id="legend">
										<legend class="">Login</legend>
									</div>
									<div class="control-group">
										<!-- Username -->
										<label class="control-label"  for="username">Username</label>
										<div class="controls">
											<input type="text" id="username" name="username" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Password -->
										<label class="control-label" for="password">Password</label>
										<div class="controls">
											<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Button -->
										<div class="controls">
											<button class="btn btn-success">Login</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="tab-pane fade" id="create">
							<form class="form-horizontal" action="register.php" method="POST">
								<fieldset>
									<div id="legend">
										<legend class="">Join us now!</legend>
									</div>
									<div class="control-group">
										<!-- Username -->
										<label class="control-label"  for="NAME">Username</label>
										<div class="controls">
											<input type="text" id="NAME" name="NAME" placeholder="name" class="input-xlarge" value="">
										</div>
									</div>
									<div class="control-group">
										<!-- Password -->
										<label class="control-label" for="PASS">Password</label>
										<div class="controls">
											<input type="password" id="PASS" name="PASS" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Student ID -->
										<label class="control-label" for="STUDENT_ID">Student ID</label>
										<div class="controls">
											<input type="text" id="STUDENT_ID" name="STUDENT_ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Social ID -->
										<label class="control-label" for="SOCIAL_ID">Social ID</label>
										<div class="controls">
											<input type="text" id="SOCIAL_ID" name="SOCIAL_ID" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- E-Mail -->
										<label class="control-label" for="EMAIL">E-Mail</label>
										<div class="controls">
											<input type="email" id="EMAIL" name="EMAIL" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Birth -->
										<label class="control-label" for="BIRTH">Birthday</label>
										<div class="controls">
											<input type="date" id="BIRTH" name="BIRTH" placeholder="" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<!-- Button -->
										<div class="controls">
											<button class="btn btn-primary">Create</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

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
		<style>
			body{
				padding-top: 60px;
				background-image: url('./image/background_01.jpg');
			}
		</style>
		<script src="./js/json-manage.js" type="text/javascript"></script>

		<!-- Todo -->
		<title>Welcome to my library</title>
		
	</head>
	<body>
		<!-- Navbar
		=============================================================== -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>	
						<span class="icon-bar"></span>	
						<span class="icon-bar"></span>	
					</a>
					<a class="brand" href="./index.html">PolarLib</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="">
								<a href="./index.html">Home</a>
							</li>
							<li class="">
								<a href="./getting-started.html">Basic</a>
							</li>
							<li class="active">
								<a href="./scaffolding.html">Manage</a>
							</li>
							<li class="">
								<a href="./base-css.html">Options</a>
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
			<div class="container well" style="max-width:900px">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Have an Account?</h3>
			</div>
			<div class="container" style="max-width:900px" >
				<div class="well">
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
						<li><a href="#newbook" data-toggle="tab">New Book</a></li>
						<li><a href="#books" data-toggle="tab">Books</a></li>
						<li><a href="#borrow" data-toggle="tab">Borrow</a></li>
						<li><a href="#create" data-toggle="tab">Books</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<!-- Personal Info
						=============================================================== -->
						<div class="tab-pane active in" id="personal">
						</div>

						<!-- New Books
						=============================================================== -->
						<div class="tab-pane fade" id="newbook">
						</div>

						<!-- Books
						=============================================================== -->
						<div class="tab-pane fade" id="books">
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd ">
<?php
	session_start();	
	require_once("examine.php");
	require_once("chkpass.php");

	$result = examine($_SESSION['user'], $_SESSION['pass']);
	if(isset($result)){
		$_SESSION['ID'] = $result['ID'];
		unset($result);
	}else{
		echo "<meta http-equiv='refresh' content='0;url=login.php'>";
		return;
	}

	$privilege = chkpass($_SESSION['ID'], "administrator");
	if(isset($privilege) && ($privilege == true)){
		;
	}else{
		return false;
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

			tr{
				overflow	: hidden;
				white-space	: nowrap;
				text-overflow : ellipsis;
			}

			tr > .third {
				max-width	: 15em;
				overflow	: hidden;
				white-space	: nowrap;
				text-overflow : ellipsis;
			}

			tr > .fourth {
				max-width	: 15em;
				overflow	: hidden;
				white-space	: nowrap;
				text-overflow : ellipsis;
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
								<a href="./general.php">General</a>
							</li>
							<li class="active">
								<a href="./manage.php">Manage</a>
							</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>

		<div class="" id="loginModal">
			<div class="container" style="max-width:900px" >
				<div class="well">
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
						<li><a href="#newbook" data-toggle="tab">New Book</a></li>
						<li><a href="#AddWebToReadPage" data-toggle="tab">Add pending</a></li>
						<li><a href="#WebsToReadPage" data-toggle="tab">Pending Page</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<!-- Personal Info
						=============================================================== -->
						<div class="tab-pane active in" id="personal">
						</div>

						<!-- New Book
						=============================================================== -->
						<div class="tab-pane fade" id="newbook">
						</div>

						<!-- Add Web Pending To Read
						=============================================================== -->
						<div class="tab-pane fade" id="AddWebToReadPage">
						</div>

						<!-- Webs Pending To Read
						=============================================================== -->
						<div class="tab-pane fade" id="WebsToReadPage">
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php 
//must be called first to have access to ANY session data
session_start();

//import 'functions'
require('config/db.php');
require('config/app.php');
require('lib/functions.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap CSS-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css"/>
		<!-- Mybands CSS -->
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<title>MyeMovies</title>
	</head>
	<body>
		<div id="wrapper" class="container">
			<header>
				<?php include('layout/header.php')?>
			</header>
			<nav>
				<?php include('layout/nav.php')?>
			</nav>
			<section role="main">
				<?php include('layout/main.php')?>
			</section>
			<footer>
				<?php include('layout/footer.php')?>
			</footer>
		</div>
	</body>
</html> 

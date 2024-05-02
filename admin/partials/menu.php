<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		<?php 
		// login check
				if(!isset($_SESSION['user']))
				{
					$_SESSION['no-login-msg']=" plaese log in ";
					header("location:".SITEURL.'admin/login.php');
				}
				?>
		<!-- menu section starts -->
		<div class ='menu text-center'>
			<div class = "wrapper">
			<ul>
				<li><a href= "index.php">HOME</a></li>
				<li><a href= "manage.php"> ADMIN </a></li>
				<li><a href= "category.php">CATEGORY </a></li>
				<li><a href= "food.php"> FOOD </a></li>
				<li><a href= "order.php"> ORDER </a></li>
				<li><a href= "logout.php"> LOG OUT </a></li>
			</ul>
			</div>
		</div>
		<!-- end -->

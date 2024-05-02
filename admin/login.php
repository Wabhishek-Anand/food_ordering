<?php include('../config/constants.php') ; ?>
<!DOCTYPE html>
<html>
	<head>
		<title> Login - Food order System - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	
<body>
	<div class = "login">
		<h1 class = 'text-center'> LOGIN </h1>
		<?php 
				if(isset($_SESSION['login']))
				{
					echo $_SESSION['login'];
					unset($_SESSION['login']); //REMOVINg SESSION MSG
				}
				if(isset($_SESSION['no-login-msg']))
				{
					echo $_SESSION['no-login-msg'];
					unset( $_SESSION['no-login-msg']);
					}

				?>
				</br> </br>
		<form action="" method="POST" class="text-center">
		username:</br></br><input type="text" name="username" placeholder ="enter your username"> </br> </br>
		password:</br></br><input type="password" name="password" placeholder ="enter your password"> </br> </br>
		<input type="submit" name="submit" value="login" class="btn-primary"> </br><br>
		<p class = 'text-center'> CREATED BY WABHISHEK ANAND </p>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		 $username=$_POST['username'];
		 $password=md5($_POST['password']);
		 $sql = "SELECT * FROM admin where user_name='$username' AND password='$password'";
		 $res = mysqli_query($conn, $sql) or die(mysqli_error());
		 $count = mysqli_num_rows($res);
				if($count==1)
				{
					$_SESSION['login'] = " LOGGED IN succesfully";
					$_SESSION['user'] = $username;
					
					header("location:".SITEURL.'admin/');
				}
				else
				{
					$_SESSION['login'] = " LOGGED IN failed";
					header("location:".SITEURL.'admin/login.php');
				}
	}
?>
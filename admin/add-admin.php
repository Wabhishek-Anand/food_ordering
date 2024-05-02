<!DOCTYPE html>
<?php 
 include('partials/menu.php') ?>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Important to make website responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>

		<div class ="main-content">
			<div class="wrapper">
				<h1> Add Admin </h1>
			<br>

			<?php 
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				?>

			<form action="" method="POST">
			<table class="tbl-30">
			<tbody>
			<tr>
				<td>full_name</td>
				<td><input type="text" name="full_name" placeholder ="enter your name"></td>
				
			</tr>
			<tr>
				<td>user_name</td>
				<td><input type="text" name="user_name" placeholder ="enter your username"></td>
			</tr>
			<tr>
				<td>password</td>
				<td><input type="password" name="password" placeholder ="your password"></td>
			</tr>
			<tr>
				<td colspan="4">
					<input type="submit" name="submit" value ="add admin" class="btn-secondary">
				</td>
				</tbody>	
			</table>
			</form>
</div>
</div>
	</body>
</html>

<?php 
	if(isset($_POST['submit']))
	{
		$full_name= $_POST['full_name'];
		$user_name= $_POST['user_name'];
		$password=md5($_POST['password']);
	
		// sql query 
		$sql = "insert into admin SET
		full_name = '$full_name',
		user_name = '$user_name',
		password = '$password'
		";
	
		// EXCUTING QUERY
		 $res = mysqli_query($conn, $sql) or die(mysqli_error());
		if($res == TRUE)
		{
			$_SESSION['add'] = "admin added succesfully";
			header("location:".SITEURL.'admin/manage.php');
		}
		else
			{
			
			$_SESSION['add'] = "FAILED TO ADD ADMIN  ";
			header("location:".SITEURL.'admin/add-admin.php');
			} 
	
	
	}
	
?>
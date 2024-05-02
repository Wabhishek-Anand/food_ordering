<?php include('../config/constants.php') ;
	
	$id = $_GET['id'];
	$sql = "DELETE FROM admin where id=$id";
	$res = mysqli_query($conn,$sql);
	if($res==TRUE)
	{
		$_SESSION['delete'] = "admin deleted succesfully";
		header("location:".SITEURL.'admin/manage.php');
	}
	else{
		$_SESSION['delete'] = "admin not deleted succesfully";
		header("location:".SITEURL.'admin/manage.php');
	}
	?>
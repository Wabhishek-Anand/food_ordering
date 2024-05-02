<?php include('../config/constants.php') ;
	
	$id = $_GET['id'];
	$sql = "DELETE FROM food where id=$id";
	$res = mysqli_query($conn,$sql);
	if($res==TRUE)
	{
		$_SESSION['delete'] = "food deleted succesfully";
		header("location:".SITEURL.'admin/food.php');
	}
	else{
		$_SESSION['delete'] = "food not deleted ";
		header("location:".SITEURL.'admin/food.php');
	}
	?>
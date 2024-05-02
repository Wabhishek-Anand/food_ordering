<?php include('../config/constants.php') ;
	
	$id = $_GET['id'];
	$sql = "DELETE FROM category where id=$id";
	$res = mysqli_query($conn,$sql);
	if($res==TRUE)
	{
		$_SESSION['delete'] = "category deleted succesfully";
		header("location:".SITEURL.'admin/category.php');
	}
	else{
		$_SESSION['delete'] = "category not deleted succesfully";
		header("location:".SITEURL.'admin/category.php');
	}
	?>
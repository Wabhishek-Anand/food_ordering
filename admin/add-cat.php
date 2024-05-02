<!DOCTYPE html>
<?php 
 include('partials/menu.php'); ?>
 
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Important to make website responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		<?php 
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']); //REMOVINg SESSION MSG
				}
				?>
		<div class ="main-content">
			<div class="wrapper">
				<h1> Add Category </h1>
			<br>
			<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
			<tbody>
			<tr>
				<td>title :</td>
				<td><input type="text" name="title" placeholder ="category title"></td>
				
			</tr>
			<tr>
				<td> Select image : </td>
				<td> <input type="file" name="image"> </td>
			</tr>
			<tr>
				<td>featured :</td>
				<td><input type="radio" name="featured" value="yes" checked> Yes</td>
				<td><input type="radio" name="featured" value="no"> No</td>
			</tr>
			<tr>
				<td>active :</td>
				<td><input type="radio" name="active" value="yes" checked> Yes</td>
				<td><input type="radio" name="active" value="no"> No</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value ="add category" class="btn-secondary">
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
		$title = $_POST['title'];
		$featured = $_POST['featured'];
		$active = $_POST['active'];
		//var_dump($_POST);
		
		//print_r($_FILES['image']);
		//die();
		if(isset($_FILES['image']['name']))
		{
			$image_name = $_FILES['image']['name'];
			$ext = end(explode('.',$image_name));
			$image_name = "food_category_".rand(000,999).'.'.$ext;
			$source_path = $_FILES['image']['tmp_name'];
			$destination_path = "../images/category/".$image_name;
			$upload = move_uploaded_file($source_path,$destination_path);
			if($upload==false)
			{
				$_SESSION['upload']="failed to upload";
				header("location:".SITEURL.'admin/add-cat.php');
				die();
			}
		} 
		else
		{
			$image_name="";
		} 

		
		$sql = "insert into category SET 
		title= '$title',
		image_name= '$image_name',
		featured= '$featured',
		active= '$active'
		";
		//echo $sql;
		$res1 = mysqli_query($conn, $sql) ;
		if($res1 == TRUE)
		{
			
		// echo'<script>alert("category added succesfully"); window.location.href="category.php";</script>';
		 $_SESSION['add'] = "category added succesfully";
			header("location:".SITEURL.'admin/category.php');
		}
		else
			{
			//echo'<script>alert("category added succesfully"); window.location.href="add-cat.php;"</script>';
			$_SESSION['add'] = "FAILED TO ADD category  ";
			header("location:".SITEURL.'admin/add-cat.php');
			} 
		
	}
?>
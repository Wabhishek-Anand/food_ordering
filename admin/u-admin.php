<?php include('partials/menu.php'); ?>
	<div class ="main-content">
			<div class="wrapper">
				<h1> update Admin </h1>
			<br>
			<?php 
				$id = $_GET['id'] ;
				$sql= "SELECT * from admin";
				$res = mysqli_query($conn,$sql);
				if($res==true)
				{
				$count = mysqli_num_rows($res);
				if($count>0)
				{
					while($rows=mysqli_fetch_assoc($res))
					{
					
					$full_name=$rows['full_name'];
					$user_name=$rows['user_name'];
					}
				}
				}
				?>
			<form action="" method="POST">
			<table class="tbl-30">
			<tbody>
			<tr>
				<td>full_name</td>
				<td><input type="text" name="full_name" value =" <?php  echo $full_name ; ?> "></td>
				
			</tr>
			<tr>
				<td>user_name</td>
				<td><input type="text" name="user_name" value =" <?php echo $user_name ; ?> "></td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="hidden" name="id" value = "<?php echo $id ;?>">
					<input type="submit" name="submit" value ="update admin" class="btn-secondary">
				</td>
				</tbody>	
			</table>
			</form>
</div>
</div>
<?php 
	if(isset($_POST['submit']))
	{
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$user_name = $_POST['user_name'];
	
		$sql = "UPDATE admin SET 
		full_name ='$full_name',
		user_name = '$user_name' 
		WHERE id ='$id' " ;
		$res = mysqli_query($conn,$sql);
		if($res==TRUE)
		{
			$_SESSION['update'] = "admin updated succesfully";
			header("location:".SITEURL.'admin/manage.php');
		}
		else {
	$_SESSION['update'] = "admin updated succesfully";
			header("location:".SITEURL.'admin/manage.php');
}
}
	
	
	
	
?>
</body> 
</html>

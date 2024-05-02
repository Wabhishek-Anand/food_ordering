<?php 
 include('partials/menu.php') ?>
 
		<div class ="main-content">
			<div class="wrapper">
				<h1> Add food</h1>
			<br>
			<?php
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']); //REMOVINg SESSION MSG
				}
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				?>
			<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
			<tbody>
			<tr>
				<td>title</td>
				<td><input type="text" name="title" placeholder ="enter your titlt"></td> 
				
			</tr>
			<tr>
				<td>descrition</td>
				<td><input type="text" name="description" placeholder ="enter about dish"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="number" name="price" placeholder =" $$$$$$$$$ "></td>
			</tr>
			<tr>
				<td> Select image : </td>
				<td> <input type="file" name="image"> </td>
			</tr>
			<tr>
				<td>category</td>
				<td>
					<select name="category">
					<?php 
						$sql ="SELECT * FROM category WHERE active='yes'";

						$res = mysqli_query($conn,$sql);

						$count = mysqli_num_rows($res);
						
						if($count>0)
						{
							while($row=mysqli_fetch_assoc($res))
							{
								$id=$row['id'];
								$title=$row['title'];
								?>
								<option value="<?php echo $id;?>"><?php echo $title; ?></option>
								<?php
							}
						}
						else
						{
							?>
							<option value="0"> NO CATEGORY FOUND </option>
							<?php
						}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>featured :</td>
				<td><input type="radio" name="featured" value="yes" checked> Yes</td>
				<td><input type="radio" name="featured" value="no">No</td>
			</tr>
			<tr>
				<td>active :</td>
				<td><input type="radio" name="active" value="yes" checked> Yes</td>
				<td><input type="radio" name="active" value="no">No</td>
			</tr>
			<tr>
				<td colspan="7">
					<input type="submit" name="submit" value ="add food" class="btn-secondary">
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
		$title= $_POST['title'];
		$description= $_POST['description'];
		$price=$_POST['price'];
		$category=$_POST['category'];
		$featured = $_POST['featured'];
        $active = $_POST['active'];
	
		if(isset($_FILES['image']['name']))
		{
			$image_name = $_FILES['image']['name'];
			if($image_name!='')
			{
				
			$ext = end(explode('.',$image_name));
			$image_name = "food_".rand(000,9999).".".$ext;
			$source_path = $_FILES['image']['tmp_name'];
			$destination_path = "../images/food/".$image_name;
			
			$upload = move_uploaded_file($source_path,$destination_path);
			if($upload==false)
			{
				$_SESSION['upload']="failed to upload";
				header("location:".SITEURL.'admin/add-food.php');
				die();
			}
		    }
			}
	 
		else
		{
			$image_name="";
		} 
		
		// sql query 
		$sql2 = "insert into food SET
			title='$title',
			description='$description',
			price='$price',
			image_name='$image_name',
			category_id='$category',
			featured='$featured',
			active='$active'
		";
	    echo $sql2;
		// EXCUTING QUERY
		$res2 = mysqli_query($conn, $sql2);
		if($res2 == TRUE)
		{
			$_SESSION['add'] = " added succesfully";
			header("location:".SITEURL.'admin/food.php');
		}
		else
			{
			
			$_SESSION['add'] = "FAILED TO ADD  " ;
			header("location:".SITEURL.'admin/add-food.php');
			} 
	
	
	}
	
?>

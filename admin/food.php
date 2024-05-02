<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		<?php include('partials/menu.php') ?>
		<div class ='main-content'>
			<div class = "wrapper">
			<h1> MANAGE FOOD </h1>
			</BR> 
			</BR> 
			<?php
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']); //REMOVINg SESSION MSG
				}
				?></br>
			<!-- button to add admin -->
			</br>
			<a href = "add-food.php" class = " btn-primary " > ADD FOOD </A> </BR>
			<BR/>
			
		<table class="tbl-full">
			<tr>
				<th>s.no</th>
				<th>title</th>
				<th>description</th>
				<th>price</th>
				<th>image-name</th>
				
				<th>featured</th>
				<th>active</th>
				<th>action</th>
			</tr>
			<?php 
				$sql= "select * from food";
				$res = mysqli_query($conn,$sql);
				$sn=1;
				if($res==true)
				{
				$count = mysqli_num_rows($res);
				$sn=1;
				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id =$row['id'];
						$title =$row['title'];
						$price =$row['price'];
						$image_name=$row['image_name'];
						$featured =$row['featured'];
						$active =$row['active'];
						$description=$row['description'];
						?>
						
				<tr>
				<td><?php echo $sn++ ; ?></td>
				<td><?php echo $title ; ?> </td>
				<td><?php echo $description ; ?></td>
				<td><?php echo $price ; ?></td>
				<td><?php echo $image_name ; ?></td>
				<td><?php echo $featured ; ?></td>
				<td><?php echo $active ; ?></td>
				<td>
					<a href="<?php echo SITEURL; ?>admin/d-food.php?id=<?php echo $id; ?>" class = "btn-secondary" > DELETE FOOD </A>
				</td>
				</tr>
				<?php
					}
				}
				}
			?>
			
			
			
			</table>
	</body>
</html>
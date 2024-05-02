<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		<?php include('partials/menu.php') ?>
		<div class ='main-content'>
			<div class = "wrapper">
			<h1> MANAGE CATEGORY </h1>
		</BR>
		<?php 
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				?> </br>
				<?php 
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']); //REMOVINg SESSION MSG
				}
				?></br> </br>
			<!-- button to add admin -->
			<a href = "add-cat.php" class = " btn-primary " > ADD CATEGORY </A>
			<BR/>
			<table class="tbl-full">
			<tr>
				<th>s.no</th>
				<th>title</th>
				<th>image_name</th>
				<th>featured</th>
				<th>active</th>
				<th>actions</th>
			</tr>
			<?php 
				$sql= "select * from category";
				$res = mysqli_query($conn,$sql);
				$sn=1;
				if($res==true)
				{
				$count = mysqli_num_rows($res);
				$sn=1;
					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{
							$id=$rows['id'];
							$title=$rows['title'];
							$image_name=$rows['image_name'];
							$featured=$rows['featured'];
							$active=$rows['active']; 
							?>
							<tr>
								<td> <?php echo $sn++ ; ?></td>
								<td><?php echo $title ; ?> </td>
								<td><?php echo $image_name ; ?> </td>
								<td><?php echo $featured ; ?></td>
								<td><?php echo $active ; ?></td>
								<td>
									<!-- <a href="<?php // echo SITEURL; ?>admin/u-admin.php?id=<?php //echo $id; ?>" class = "btn-secondary" > UPDATE CATEGORY </a> -->
									<a href="<?php echo SITEURL; ?>admin/d-category.php?id=<?php echo $id; ?>" class = "btn-danger" > DELETE CATEGORY </a>
								</td>
							</tr>
							<?php
						}
					}
				}
		?>
			
			
			</table>
			</div>
			</div>
			</body>
	</head>
</html>
<?php include('partials/menu.php'); ?>
<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>

		
		<!-- main content section -->
		<div class ='main-content'>
			<div class = "wrapper">
			<h1> MANAGE ADMIN </h1>
			</BR> 
			
			<?php 
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']); //REMOVINg SESSION MSG
				}
				?>
				<?php 
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']); //REMOVINg SESSION MSG
				}
				?>
				<?php 
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']); //REMOVINg SESSION MSG
				}
				?>
			</br> </br> 
			<!-- button to add admin -->
			<a href = "add-admin.php" class = " btn-primary " > ADD ADMIN </A>
			<BR/>
			<table class="tbl-full">
			<tr>
				<th>s.no</th>
				<th>full-name</th>
				<th>user-name</th>
				<th>actions</th>
			</tr>
			
			<?php 
				$sql= "select * from admin";
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
					$full_name=$rows['full_name'];
					$user_name=$rows['user_name'];
				?>
			<tr>
				<td><?php echo $sn++ ; ?></td>
				<td><?php echo $full_name ; ?> </td>
				<td><?php echo $user_name ; ?></td>
				<td>
					<a href="<?php echo SITEURL; ?>admin/u-admin.php?id=<?php echo $id; ?>" class = "btn-secondary" > UPDATE ADMIN </A>
					<a href="<?php echo SITEURL; ?>admin/d-admin.php?id=<?php echo $id; ?>" class = "btn-danger" > DELETE ADMIN </A>
				</td>
			</tr>
			<?php
					}
				}
				else
					{
					}
				}
			?>
			
			
			
			</table>
			
			</div>
		</div>
		<!--end-->
	</body>
</html>	
	

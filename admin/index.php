<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		
	<?php include('partials/menu.php'); ?>
		
		<!-- main content section -->
		<div class ='main-content'>
			<div class = "wrapper">
			<h1> DASHBOARD </h1>
			<?php 
				if(isset($_SESSION['login']))
				{
					echo $_SESSION['login'];
					unset($_SESSION['login']); //REMOVINg SESSION MSG
				}
				?>
			
			<div class="col-4 text-centre">
			<?PHP 
				$sql= "select * from category";
				$res = mysqli_query($conn,$sql);
				$count =mysqli_num_rows($res);
				?>
				<h1><?php echo $count ;?></h1>
				 CATEGORY
				<br/>
				<br/>
			</div>
			
			<div class="col-4 text-centre">
			<?PHP 
				$sql2= "select * from food";
				$res2 = mysqli_query($conn,$sql);
				$count2 =mysqli_num_rows($res2);
				?>
				<h1><?php echo $count2 ;?></h1>
				FOOD
				<br/>
				<br/>
			</div>
			
			<div class="col-4 text-centre">
		        <?PHP 
				//$sql3= "select * from order";
				//$res3 = mysqli_query($conn,$sql);
				//$count3 =mysqli_num_rows($res3);
				?>
				<h1><?php// echo $count3 ;?> 0</h1>
				TOTAL ORDER
				<br/>
			</div>
			
			<div class="col-4 text-centre">
				<h1> 000</h1>
				 RENEVUE
				<br/>
			</div>
			
			<div class="clearfix"></div>
			
			</div>
		</div>
		<!--end-->
		
	
	
	</body>
</html>
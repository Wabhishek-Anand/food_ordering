<html>
	<head>
		<title> Food ordering - home page </title>
		<link rel= "stylesheet " href="../css/admin.css" >
	</head>
	<body>
		<?php include('partials/menu.php') ?>
		<div class ='main-content'>
			<div class = "wrapper">
			<h1> MANAGE ORDER </h1>
			</BR>
			
			<BR/>
			<table class="tbl-full">
			<tr>
				<th>id</th>
				<th>food</th>
				<th>price</th>
				<th>quantity</th>
				<th>total</th>
				<th>order_date</th>
				<th>status</th>
				<th>c_name</th>
				<th>c_contact</th>
				<th>c_email</th>
				<th>c_address</th>
				
			</tr>
			<?php 
				$sql= "select * from order";
				$res = mysqli_query($conn,$sql);
				$sn=1;
				if($res==true)
				{
				$count = mysqli_num_rows($res);
				$sn=1;
				}
				?>
			</table>
	</head>
</html>
<?php   

	SESSION_start();

	 define('SITEURL','http://localhost/food_ordering/');
	 define('LOCALHOST','localhost');
	 define('DB_USERNAME','root');
	 define('DB_PASSWORD','12345');
	 define('DB_NAME','food_order');
	 
	 $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
	 $db_select = mysqli_select_db($conn, DB_NAME) or die (mysqli_error());
/* if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully"; 
	 */
	
	
?>
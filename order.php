 <?php include('frontp/menu.php'); ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3>pizza</h3>
                        <p class="food-price"> Rs 300 </p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. xyz" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php 
	if(isset($_POST['submit']))
	{
		$full_name= $_POST['full-name'];
		$phone_number = $_POST['contact'];
		$email = $_POST['email'];
		$address = $_POST['address'];
	
		// sql query 
		$sql = "insert into adm_order SET
		c_name = '$full_name',
		c_contact = '$phone_number',
		c_email = '$email',
		c_address = '$address'
		";
	
		// EXCUTING QUERY
		 $res = mysqli_query($conn, $sql) or die(mysqli_error());
		if($res == TRUE)
		{
			$_SESSION['add'] = "order succesfully";
			header("location:".SITEURL.'food.php');
		}
		else
			{
			
			$_SESSION['add'] = "FAILED   ";
			header("location:".SITEURL.'food.php');
			} 
	
	
	}
	
?>

    <?php include('frontp/footer.php'); ?>
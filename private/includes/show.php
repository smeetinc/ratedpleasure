<?php
	require 'autoload.php';
    $Error ="";
	
    if(!($_SERVER['REQUEST_METHOD'] == "POST")){
        $Error= "form not submitted";
         header('Location: ../register1.php?error= Form not submitted');
    die;
    }else{

        //clean user input 
        $sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);


	$car_make = $sanitizer['car_make'];
	$car_year = $sanitizer['car_year'];
	$car_model = $sanitizer['car_model'];
	$car_transmission = $sanitizer['car_transmission'];
	$car_body = $sanitizer['car_body'];
	$car_use = $sanitizer['car_use'];
	$car_distance = $sanitizer['car_distance'];
	$car_address = $sanitizer['car_address'];
	$car_registration = $sanitizer['car_registration'];
	$customer_title = $sanitizer['customer_title'];
	$customer_name = $sanitizer['customer_name'];
	$customer_birthdate = $sanitizer['customer_birthdate'];
	$customer_email = $sanitizer['customer_email'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $customer_email)){
    $Error= "Please enter a correct email";
}
	$customer_phone = $sanitizer['customer_phone'];
	$customer_occupation = $sanitizer['customer_occupation'];
	$package_type = $sanitizer['package_type'];

    // Check empty inputs

    if(empty($car_make) || empty($car_year) || empty($car_model) || empty($car_transmission) || empty($car_body) || empty($car_use) || empty($car_distance) || empty($car_address) || empty($car_registration) || empty($customer_title) || empty($customer_name) || empty($customer_birthdate) || empty($customer_phone) || empty($customer_occupation) || empty($package_type)){
        $Error= "Please, Fill in all fields";
         header('Location: ../register1.php?error='.$Error);
        
    }



    if($Error !=""){
        header('Location: ../register1.php?error='.$Error);
        die;
    }





	
   

   /* session_start();
    $_SESSION['car_make']=$car_make;
    $_SESSION['car_year']=$car_year;
    $_SESSION['car_model']=$car_model;
    $_SESSION['car_transmission']=$car_transmission;
    $_SESSION['car_body']=$car_body;
    $_SESSION['car_use']=$car_use;
    $_SESSION['car_distance']=$car_distance;
    $_SESSION['car_address']=$car_address;
    $_SESSION['car_registration']=$car_registration;
    $_SESSION['customer_title']=$customer_title;
    $_SESSION['customer_name']=$customer_name;
    $_SESSION['customer_birthdate']=$customer_birthdate;
    $_SESSION['customer_email']=$customer_email;
    $_SESSION['customer_phone']=$customer_phone;
    $_SESSION['customer_occupation']=$customer_occupation;
    $_SESSION['package_type']=$package_type;
    */


	$sql = "INSERT INTO customer (car_make, car_year, car_model, car_transmission, car_body, car_use, car_distance, car_address, car_registration, customer_title, customer_name, customer_birthdate, customer_email, customer_phone, customer_occupation, package_type) VALUES ('$car_make', '$car_year', '$car_model', '$car_transmission', '$car_body', '$car_use', '$car_distance', '$car_address', '$car_registration', '$customer_title', '$customer_name', '$customer_birthdate', '$customer_email', '$customer_phone', '$customer_occupation', '$package_type');";

	$result = mysqli_query($conn, $sql);



	header('Location: ../payment.php?email='.$customer_email);


	/*$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	echo "SQL error";
	 }else{
	 	mysqli_stmt_bind_param($stmt, "sssssssssssssss", $car_make, $car_year, $car_model, $car_transmission, $car_body, $car_use, $car_distance, $car_address, $car_registration, $customer_title, $customer_name, $customer_birthdate, $customer_phone, $customer_occupation, $package_type);
	 	mysqli_stmt_execute($stmt);
 	 } 	*/
	 //Payment Processing per package choice

/*
	if($package_type=="basic"){
		echo "Basic Selected
		<div class='mytabs'>
		<input type='radio' id='tabfree' name='mytabs' checked='checked'>
		<label for='tabfree'>Credit/Debit Card Payment</label>
		<div class='tab'>
		<h2>Basic Package</h2>
		<strong><p> Price: #2,100 (350 Naira per month for 6 months)</strong>
		<br><span class='promo'>[Enjoy 10% off on full payment at once]</span></p>

		<a href='paystackLink'><button type='submit' name='submit2' id='submit2'>Proceed to pay N1890 </button></a>
		<br>
		<form method='POST' action=''>
		<select id='selectbox1' name='invoice_limits' value='' required>
		<option value='' selected='selected'>Please Select:</option>
		<option value='1'>1</option>
		<option value='2'>2</option>
		<option value='3'>3</option>
		<option value='4'>4</option>
		<option value='5'>5</option>
		<option value='6'>6</option>
		</select> 
		<button type='submit' class='paybtn' id='submit3' name='submit3'>Proceed to Payment</p>

		</div>

		<input type='radio' id='tabsilver' name='mytabs'>
		<label for='tabsilver'>silver</label>
		<div class='tab'>
		<h2>Silver</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis molestias commodi officia, vel. Quo ratione vitae aliquid aliquam provident?</p>

		</div>

		<input type='radio' id='tabgold' name='mytabs'>
		<label for='tabgold'>Gold</label>
		<div class='tab'>
		<h2>Gold</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nobis molestias commodi officia, vel. Quo ratione vitae aliquid aliquam provident?</p>

		</div>



		</div>";

		//header(Location: ../)
	}elseif ($package_type == "advance") {
		echo "Advance selected";
	} else{
		echo "Premium selected";
	}
*/
}
?>



</section>       

    <!---------- End Display Checkout Content------>
    <!-------Footer------>
   <footer>
       <div class="container footer-row">
        <hr>
        <div class="footer-left-col">
            <div class="footer-links">
                <div class="link-title">
                    <h4>Product</h4><br>
                    <small>Our Plan</small>
                    <small>Free Trial</small>
                </div>
                <div class="link-title">
                    <h4>About Us</h4><br>
                    <small>Request Demo</small>
                    <small>FAQs</small>
                </div>
                <div class="link-title">
                    <h4>Support</h4><br>
                    <small>Features</small>
                    <small>Contact Us</small>
                </div>
               
            </div>
        </div>
        <div class="footer-right-col">
            <div class="footer-info">
                <div class="copyright-text">
                    <small>support@roadsideassist.com.ng</small>
                    <small>&copy; 2021 | RoadSideAssist</small>
                </div>
                <div class="footer-logo">
                    <img src="../img/logo1.png">
                    <br>
                    <img src="../img/ng.png">
                </div>
            </div>
        </div>
       </div>
   </footer>

   
<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right="0";
    }
    function hideMenu(){
        navLinks.style.right="-200px";
    }

    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 1000,
        speedAsDuration: false
    });

</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 3000,
        once: true,
    });
</script>
</body>
</html>

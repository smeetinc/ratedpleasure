<footer class="container-fluid bg-dark text-light p-3">

	<div class="row">
		<div class="col-lg-4">
			<div class="footer-contact">
				<img src="../img/logo4.png" class="logo-nav logo me-3">
				<p class="h5">Contact</p>
				
				<p><span class="fw-bold">Phone: </span> +23481788573884 </p>
				<p><span class="fw-bold">Operating Hours: </span> 24/7 </p>

				<p class="h5">Follow us</p>

				<ul class=" d-flex list-inline list-unstyled">
					<li class="me-2"><a href="https://www.instagram.com/ratedpleasure_" target="_blank"><i class="bi bi-instagram"></a></i></li>
					<li class="me-2"><a href="https://api.whatsapp.com/send/?phone=2348178573884&text=Hello%20I%20was%20redirected%20from%20your%20website(ratedpleasure.com),%20please%20I%20will%20like%20to...&app_absent=0" target="_blank"><i class="bi bi-whatsapp"></a></i></li>
					
				</ul>


			</div>
		</div>
		<div class="col-sm-6 col-lg-2">
			<div>
				<p class="h5">Quick Links</p>

				<ul class="text-light list-unstyled">
					<li><a class="nav-link" href="../about_us.php">About Us</a></li>
					<li><a class="nav-link" href="../delivery_info.php">Delivery Information</a></li>
					<li><a class="nav-link" href="../privacy_policy.php">Privacy Policy</a></li>
					<li><a class="nav-link" href="../terms.php">Terms & Conditions</a></li>
					<li><a class="nav-link" href="../contact.php" class="nav-link">Contact Us</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-lg-2">
			<div>
				<p class="h5">My Account</p>

				<ul class="text-light list-unstyled">
					<li>
						<?php 
						if(!isset($_SESSION['username'])){
							echo "<a class='nav-link' href='user_login.php'>Sign in</a>";
						}else{
							echo "
							<a class='nav-link' href='logout.php'>Logout</a>
						";
						}
						?>
						</li>
					<li><a class="nav-link" href="../cart.php">View Cart</a></li>
					<!-- <li>Track My Order</li> -->
					<li><a class="nav-link" href="../help_center.php">Help</a></li>
					
				</ul>
			</div>
		</div>
		<div class="col-lg-4">
			<div>
				<img src="../img/cardspaystack.png" class="footer-img" alt="supported payments by Paystack">

			</div>
		</div>
	</div>

	<p class="text-center"><small>&copy; <?php echo date('Y'); ?> | All rights reserved.</small></p>
		
</footer>



<!--- Bootstrap cdn js link -->
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="../js/custom.js"></script>

<script>
	<?php if(isset($_SESSION['message'])) { ?>
	alertify.set('notifier', 'position', 'top-right');
	alertify.success('<?= $_SESSION['message']; ?>');

	<?php
		 unset($_SESSION['message']);
	}?>
</script>
<!-- Swipper Js --
<script src="js/swiper-bundle.min.js"></script> 

<---page script --
<script src="js/script.js"></script>-->
</body>
</html>
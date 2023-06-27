 <?php 
require "../../private/autoload.php";
include('../functions/common_functions.php');
session_start();

 if (!isset($_SESSION['username'])) {
	 echo "<script>alert('Page restricted, login to proceed')</script>";
	 echo "<script>window.open('admin_login.php', '_self')</script>";
 }

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RatedPleasure-Admin</title>

        <!-- Bootstrap Css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!-- FontAwesome Link -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="../css/main.css">

        <!---Swiperjs css -->
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
		<style>
	.admin_image{
		width:100px;
		object-fit: contain;
	}
	.footer{
		position: absolute;
		bottom: 0;
	}
	body{
		overflow-x:hidden;
	}
	.product_img{
		width: 10%;
		object-fit: contain;
	}

</style>

        
    </head>
    <body>
        <!-- Navbar here -->
        <div class="container-fluid p-0">
            <!-- first child -->

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <img src="../img/logo3.png" alt="site logo" class="logo-nav me-3 logo">
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">Welcome <?php echo $_SESSION['username']; ?></a>
            </li>
        </ul>
    </nav>
</div>
</nav>
</div>
<main>

	<section class="bg-light">

		<h3 class="text-center p-2">ADMIN DASHBOARD</h3>
		
	</section>
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-12 bg-secondary p-1 d-flex align-items-center">

				<div class="p-3">
					
					<p class="text-light text-center">Admin Name: <?php echo $_SESSION['username']; ?></p>
				</div>
				<div class="button text-center">
					<button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a></button>
					<button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
					<button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert categories</a></button>
					<button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View categories</a></button>
					<button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
					<button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
					<button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
					<button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
				</div>
				 
			</div>
			
		</div>
	</section>
	<section class="container">
		<div class="my-5">

		<?php  

			if(isset($_GET['insert_categories'])){

				include "insert_categories.php";

			}
			if(isset($_GET['view_products'])){

				include "view_products.php";

			}
			if(isset($_GET['edit_products'])){

				include "edit_products.php";

			}
			if(isset($_GET['delete_product'])){

				include "delete_product.php";

			}
			if(isset($_GET['view_categories'])){

				include "view_categories.php";

			}
			if(isset($_GET['edit_category'])){

				include "edit_category.php";

			}
			if(isset($_GET['delete_category'])){

				include "delete_category.php";

			}
			if(isset($_GET['list_orders'])){

				include "list_orders.php";

			}
			if(isset($_GET['delete_orders'])){

				include "delete_orders.php";

			}
			if(isset($_GET['list_payments'])){

				include "list_payments.php";

			}
			if(isset($_GET['delete_payments'])){

				include "delete_payments.php";

			}
			if(isset($_GET['list_users'])){

				include "list_users.php";

			}
			if(isset($_GET['delete_user'])){

				include "delete_user.php";

			}
		?>
	 </div>
		
	</section>
	
</main>
<?php 
	
	include "footer.php";
?>
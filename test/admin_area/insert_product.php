<?php 
	include "../../private/autoload.php";

	if(isset($_POST['insert_product'])){
		$product_title =$_POST['product_title'];
		$product_description = $_POST['product_description'];
		$product_keywords = $_POST['product_keywords'];
		$product_category = $_POST['product_category'];
		$product_price = $_POST['product_price'];
		$product_rating = $_POST['product_rating'];
		$product_status = 'true';

		//accessing images
		$product_image1 = $_FILES['product_image1']['name'];
		$product_image2 = $_FILES['product_image2']['name'];
		$product_image3 = $_FILES['product_image3']['name'];
		$product_image4 = $_FILES['product_image4']['name'];

		//accessing image tmp name

		$tmp_image1 = $_FILES['product_image1']['tmp_name'];
		$tmp_image2 = $_FILES['product_image2']['tmp_name'];
		$tmp_image3 = $_FILES['product_image3']['tmp_name'];
		$tmp_image4 = $_FILES['product_image4']['tmp_name'];

		//check empty fields
		if($product_title == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_price == '' || $product_rating == '' || $product_image1 == ''){

			echo "<script>alert('Please fill all available fields')</script>";
			exit();

		}else{
			move_uploaded_file($tmp_image1, "./product_images/$product_image1");
			move_uploaded_file($tmp_image2, "./product_images/$product_image2");
			move_uploaded_file($tmp_image3, "./product_images/$product_image3");
			move_uploaded_file($tmp_image4, "./product_images/$product_image4");

			// Insert query

			$insert_products = "insert into `products` (product_title, product_description, product_keywords, category_id, product_image1, product_image2, product_image3, product_image4, product_price, product_rating, date, status) values ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_image1', '$product_image2', '$product_image3', '$product_image4', '$product_price', '$product_rating', NOW(), '$product_status')";
			$result_query = mysqli_query($conn, $insert_products);
			if ($result_query){
				echo "<script>alert('products inserted successfully')</script>";
			}else{
				echo "<script>alert('error uploading, try again!')</script>";
			}
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ADMIN - INSERT PRODUCT</title>
	<!-- Bootstrap Css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- FontAwesome Link -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="../css/main.css">

        <!---Swiperjs css -->
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">
</head>
<body class="bg-light">
	<main class="container mt-3">
		<h1 class="text-center">Insert Products</h1>
		<!---Form --->
		<form action="" method="post" enctype="multipart/form-data">

			<!--title-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_title" class="form-label">Product title</label>
				<input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
			</div>
			<!--Description-->

			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_description" class="form-label">Product description</label>
				<input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
			</div>

			<!--keywords-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_keywords" class="form-label">Product keywords</label>
				<input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
			</div>

			<!---Categories-->

			 <div class="form-outline mb-4 w-50 m-auto">
			 	<select name="product_category" id="" class="form-select">
			 		<option value="">Select a Category</option>

			 		 <?php 

                            //select database record

                            $select_query = "select * from category";
                            $result_select = mysqli_query($conn, $select_query);
                            while ($row_cat_data = mysqli_fetch_assoc($result_select)) {
                                // code...

                                $category_title = $row_cat_data['category_title'];
                                $category_id = $row_cat_data['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>

			 	</select>
			 </div>

			 <!--Image1-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image1" class="form-label">Product image1</label>
				<input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
			</div>

			<!--Image2-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image2" class="form-label">Product image2</label>
				<input type="file" name="product_image2" id="product_image2" class="form-control">
			</div>
			<!--Image3-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image3" class="form-label">Product image3</label>
				<input type="file" name="product_image3" id="product_image3" class="form-control">
			</div>

			<!--Image4-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_image4" class="form-label">Product image4</label>
				<input type="file" name="product_image4" id="product_image4" class="form-control">
			</div>

			<!--price-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_price" class="form-label">Product price</label>
				<input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
			</div>

			<!--rate-->
			<div class="form-outline mb-4 w-50 m-auto">
				<label for="product_rating" class="form-label">Product rating</label>
				<input type="text" name="product_rating" id="product_rating" class="form-control" placeholder="Enter product rating" autocomplete="off" required="required">
			</div>

			<!--Submit-->
			<div class="form-outline mb-4 w-50 m-auto">
				
				<input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
			</div>


		</form>
	</main>



	<?php include "footer.php"; ?>
</body>
</html>
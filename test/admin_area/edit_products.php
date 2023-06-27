<?php
    if(isset($_GET['edit_products'])){
        $edit_id = $_GET['edit_products'];
        $get_data = "Select * from `products` where product_id=$edit_id";
        $result = mysqli_query($conn, $get_data);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $category_id = $row['category_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_image4 = $row['product_image4'];
        $product_price = $row['product_price'];


        //fetching the category name
        $select_category = "Select * from `category` where category_id=$category_id";
        $result_category = mysqli_query($conn, $select_category);
        $row_category = mysqli_fetch_assoc($result_category);
        $category_title = $row_category['category_title'];
    }
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title; ?>" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo $product_description; ?>" name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords; ?>"name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
            <select type="text" id="product_category" name="category_id" class="form-select">
                <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                <?php
                //fetching the category name
        $select_category_all = "Select * from `category`";
        $result_category_all = mysqli_query($conn, $select_category_all);
        while ($row_category_all = mysqli_fetch_assoc($result_category_all)){
            $category_title = $row_category_all['category_title'];
            $category_id = $row_category_all['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        };
        
        ?> 
        </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image1; ?>" alt="<?php echo $product_image1; ?>" class="product_img">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image2; ?>" alt="<?php echo $product_image2; ?>" class="product_img">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image3; ?>" alt="<?php echo $product_image3; ?>" class="product_img">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image 4</label>
            <div class="d-flex">
            <input type="file" id="product_image4" name="product_image4" class="form-control w-90 m-auto" required="required">
            <img src="./product_images/<?php echo $product_image4; ?>" alt="<?php echo $product_image4; ?>" class="product_img">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" value="<?php echo $product_price; ?>" name="product_price" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
        </div>
        
        
    </form>
</div>


<?php
//working on the update logic now
 
if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $category_id = $_POST['category_id'];
    $product_price = $_POST['product_price'];
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image1_tmp = $_FILES['product_image1']['tmp_name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];
    $product_image4 = $_FILES['product_image4']['name'];
    $product_image4_tmp = $_FILES['product_image4']['tmp_name'];


    move_uploaded_file($product_image1_tmp, "./product_images/$product_image1");
    move_uploaded_file($product_image2_tmp, "./product_images/$product_image2");
    move_uploaded_file($product_image3_tmp, "./product_images/$product_image3");
    move_uploaded_file($product_image4_tmp, "./product_images/$product_image4");

    //Query to update products
    $update_products = "update `products` set product_title='$product_title', product_description='$product_description', product_keywords='$product_keywords', category_id=$category_id, product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_image4='$product_image4', product_price='$product_price', date=Now() where product_id=$edit_id";
    $result_update = mysqli_query($conn, $update_products);
    if($result_update){
        echo "<script>alert('product record updated successfully')</script>";
        echo "<script>window.open('./insert_product.php', '_self')</script>";
    }

}


?>
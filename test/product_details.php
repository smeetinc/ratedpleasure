<?php 
include "header.php";
?>
<style>
@media(max-width: 800px){
.sm_mb_2{
    margin-bottom: 1rem;
}
}
</style>
<main>
    <section class="fourth-section">
        <h2 class="text-center mb-2">PRODUCT DETAILS</h2>
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-2 bg-secondary p-0 d-none d-md-block">
                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item theme_color_bg text-light">
                            <a href="#" class="nav-link">
                                <h4>Categories</h4>
                            </a>
                        </li>

                        <?php 

                           getcategories();
                        ?>
                    </ul>
                </div>
                <div class="col-md-10">

                    <!--- Products --->

                    <div class="container">

                        <div class="row">

                                              
                            <?php

                            // view_details();  
                            if (isset($_GET['product_id'])) {
                                $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
                        
                                if (!isset($_GET['category'])) {
                                    $product_id = $sanitizer['product_id'];
                        
                                    $select_query = "select * from `products` where product_id=$product_id";
                                    $result_query = mysqli_query($conn, $select_query);
                                    $row = mysqli_fetch_assoc($result_query);
                                    $product_id = $row['product_id'];
                                    $product_title = $row['product_title'];
                                    $product_description = $row['product_description'];
                                    $product_image1 = $row['product_image1'];
                                    $product_image2 = $row['product_image2'];
                                    $product_image3 = $row['product_image3'];
                                    $product_image4 = $row['product_image4'];
                                    $product_price = $row['product_price'];
                                    $product_rating = $row['product_rating'];
                                    $product_priceadj = $product_price * 2.3;
                        
                        
                                    echo "
                                        <div class='bg-light py-4>
                                        <div class='container mt-3'>
                                                    <div class='row mb-3'>
                                                    <div class='col-md-4'>
                                                        <div class='shadow'>
                                                
                                                            <img src='./admin_area/product_images/$product_image1' class='card-img-top image-fluid' alt='$product_title'>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-8'>
                                                    <div class='d-flex justify-content-between mt-4'>
                                                        <h4 class='fw-bold'>$product_title</h4>
                                                        <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                                                    </div>
                                                    <hr class='my-0'>
                                                        <br>
                                                        <p>$product_description</p>
                                                        <div class='row'>
                                                        <div class='d-flex justify-content-between'>
                                                                <h5 class='text-success fw-bold'>&#8358; $product_price</h5>
                                                                 
                                                                <s><h6 class='text-danger'>&#8358; $product_priceadj</h6></s>
                                                        </div>
                                                            
                                                        </div>
                                                        <div class='row'>
                                                            ";
                        ?>
                                                            <form action="includes/details_logic.inc.php" method="POST">
                                                                <div class='d-flex mb-3 col-md-4'>
                        
                                                                    <button class='input-group-text decrement-btn'>-</button>
                                                                    <input type="hidden" value="<?php echo $product_id; ?>" name="product_id">
                                                                    <input type='number' class='form-control bg-white text-center input-qty' value="1"  name='qty'>
                                                                    <button class='input-group-text increment-btn'>+</button>
                                                                </div>
                                                                    
                                                                    <div class='mt-3 col-md-10 mb-2'>
                                                                    
                                                                        <button class='btn btn-danger px-4 me-3 sm_mb_2' value='$product_id' name="submit_details"><i class='fa fa-shopping-cart me-2'></i>Add to Cart</button>
                                                                    </div>    
                                                            </form>
                                                                <a href="display_all.php" class="nav-link"><button class='btn btn-secondary px-4'><i class='fa fa-heart me-2'></i>Continue Shopping</button></a>
                                                            </div>
                                
                                                                       
                                                                    </div>
                                
                                                        
                                                        </div>
                                                        <?php echo "
                                                        <div class='row mt-3'>
                                                            <h4>More Images of the product</h4>
                                                            <hr>
                                                            <div class='d-flex mt-3 justify-content-between align-items-center'>
                                                            <div class='col-md-4 border p-1'>
                        
                                                                
                                                
                                                                    <img src='./admin_area/product_images/$product_image2' class='card-img-top image-fluid' alt='$product_title'>
                                                                
                                                            </div>
                                                            <div class='col-md-4 border p-1'>
                        
                                                                
                                                
                                                                    <img src='./admin_area/product_images/$product_image3' class='card-img-top image-fluid' alt='$product_title'>
                                                                
                                                            </div>
                                                            <div class='col-md-4 border p-1'>
                        
                                                                
                                                
                                                                    <img src='./admin_area/product_images/$product_image4' class='card-img-top image-fluid' alt='$product_title'>
                                                                
                                                            </div>
                                                                
                                                        </div>
                                                    </div>
                                            </div>  
                                        </div>         
                                            ";
                        
                        
                                }
                            }
                        
                        
                        
                            ?>

                            <?php


                       get_unique_categories();


                    ?>


                        </div>

                        <div class="row">
                            <!--- related Products-->
                        </div>


                    </div>
                </div>
            </div>


        </div>

    </section>

   




</main>
<?php 
  require "footer.php";
  ?>
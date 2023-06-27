<?php 
//require "../private/autoload.php";
//include "functions/common_functions.php";

include "header.php";

?>
<main>

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class='table-responsive'>
                <table class="table table-bordered text-center">

                    <!--- Dynamic content --->
                    <?php
                         //global $conn;
                         $ip = getIPAddress();
                        $total = 0;
                         $cart_query = "select * from `cart_details` where ip_address='$ip'";
                         $result = mysqli_query($conn, $cart_query);
                         $result_count = mysqli_num_rows($result);
                    if ($result_count > 0) {
                        


                        echo "<thead class='mt-6'>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";
                        while ($row = mysqli_fetch_array($result)) {
                            $qty = $row['quantity'];
                            $product_id = $row['product_id'];
                            $select_products = "select * from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($conn, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                                $product_price = array(($row_product_price['product_price']) * ($qty));
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_image1'];
                                $product_values = (array_sum($product_price)) ;
                                $total += $product_values;
                                
                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $product_title ?>
                                        </td>
                                        <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>"
                                        alt="<?php echo $product_title ?>" class="cart_img"></td>
                                        <td>
                                            <form action="" method="post">
                                                <div class="form-outline mb-4 w-20">
                                            <input type="number" class="form-control w-20 m-auto text-center"  size="4" value="<?php echo $qty; ?>" name="qty<?php echo ($product_id); ?>"/>
                            </div>  
                                          
                            <input type="submit" value="Update cart" name="update_cart" class="btn btn-secondary">
                                            </form>
                                            <?php
                                $ip = getIPAddress();
                                if (isset($_POST['update_cart'])) {
                                    if (isset($_POST['qty' . $product_id])) {
                                        $qty = (int) $_POST['qty' . $product_id];
                                        if ($qty <= 0){
                                            $qty = 1;
                                        }
                                        $run_qty = mysqli_query($conn, "update `cart_details` set quantity='$qty' where product_id='$product_id' and ip_address='$ip'");
                                        if ($run_qty) {
                                            echo "<script>window.open('cart.php', '_self')</script>";
                                            echo "<script>alert('Quantity updated successfully')</script>";                                           
                                         
                                        }
                                    }
                                }



                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $price_table ?>
                                           
                                            
                                        </td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Remove" class="btn btn-danger px-3 py-2 border-0 mx-3"
                                name="remove_cart">
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                       else{
                            echo "<h2 class='text-danger text-center'>Cart is empty</h2>";
                        }
                        
                            ?>
                    </tbody>
                </table>
                    </div>

                <!---- SubTotal --->
                <div>
                    <?php
                        // global $conn;
                         $ip = getIPAddress();
                         $cart_query = "select * from `cart_details` where ip_address='$ip'";
                         $result = mysqli_query($conn, $cart_query);
                         $result_count = mysqli_num_rows($result);
                         if($result_count>0){
                            echo "
                            
                <h4 class='my-3'>Total:<strong class='text-muted'> &#8358; ".$total."</strong></h4>
                <p><strong><small>Additional charges may apply for delivery</small></strong></p>
                <button class='btn btn-secondary p-3 mb-3 me-2 border-0'><a href='display_all.php' class='nav-link'>Continue Shopping</a></button>
                <button class='btn btn-danger mb-3 p-3 border-0'><a href='users_area/checkout.php' class='nav-link'>Checkout</a></button>";
                         }else{
                            echo "<button class='btn btn-secondary p-3 mb-3 me-2 border-0'><a href='display_all.php' class='nav-link'>Continue Shopping</a></button>";
                         }
                         ?>
                </div>
            </form>

            <!---- Function to remove item -->
            <?php
                function remove_cart_item(){

                     global $conn;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem'] as $remove_id){
                            
                            $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                            $run_delete=mysqli_query($conn, $delete_query);
                            if($run_delete){
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }
                        }
                    }

                }
                
                echo $remove_item = remove_cart_item();
            ?>

        </div>
    </div>



</main>
<?php 
  require "footer.php";
  ?>
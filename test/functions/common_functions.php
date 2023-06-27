<?php
ob_start();


//getting products

function getproducts()
{
    global $conn;
    //condition to check isset or not 

    if (!isset($_GET['category'])) {

        $select_query = "select * from `products` order by rand() limit 0,9";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $category_id = $row['category_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top image-fluid' alt='$product_title'>
                            <div class='card-body'>
                            <div class='d-flex justify-content-between'>
                            <h5 class='card-title'>$product_title</h5>
                            <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                            </div>
                                <p class='card-text'>&#8358; $product_price</p>
                                <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg mb-1'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                            </div>
                        </div>
                    </div>";


        }
    }
}

//get Trending products

function get_trending_products()
{
    global $conn;
    //condition to check isset or not 

    if (!isset($_GET['category'])) {

        $select_query = "select * from `products` where product_rating >= 4.0 order by rand() limit 0,9";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top image-fluid' alt='$product_title'>
                            <div class='card-body'>
                            <div class='d-flex justify-content-between'>
                            <h5 class='card-title'>$product_title</h5>
                            <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                            </div>
                                <p class='card-text'>&#8358; $product_price</p>
                                <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg mb-1'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                            </div>
                        </div>
                    </div>";


        }
    }
}
//getting latest products
function get_latest_products()
{
    global $conn;
    //condition to check isset or not 

    if (!isset($_GET['category'])) {

        $select_query = "select * from `products` order by `product_id` desc limit 0,9";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top image-fluid' alt='$product_title'>
                            <div class='card-body'>
                                <div class='d-flex justify-content-between'>
                                <h5 class='card-title'>$product_title</h5>
                                <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                                </div>
                                <p class='card-text'>&#8358; $product_price</p>
                                <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg mb-1'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                            </div>
                        </div>
                    </div>";


        }
    }
}

//getting all products
function get_all_products()
{
    global $conn;

    //condition to check isset or not 

    if (!isset($_GET['category'])) {

        $select_query = "select * from `products` order by rand()";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                        <div class='d-flex justify-content-between'>
                        <h5 class='card-title'>$product_title</h5>
                        <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                        </div>
                            <p class='card-text'>&#8358; $product_price</p>
                            <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg mb-1'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                        </div>
                    </div>
                </div>";


        }
    }
}


//getting unique categories 
function get_unique_categories()
{

    global $conn;

    //condition to check isset or not 

    if (isset($_GET['category'])) {

        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $category_id = $sanitizer['category'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $category_id = $row['category_id'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2 mb-2'>
                       <div class='card'>
                           <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top' alt='$product_title'>
                           <div class='card-body'>
                           <div class='d-flex justify-content-between'>
                           <h5 class='card-title'>$product_title</h5>
                           <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                           </div>
                               <p class='card-text'>&#8358; $product_price</p>
                               <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg'>Add to Cart</a>
                               <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                           </div>
                       </div>
                   </div>";


        }
    }
}



function getcategories()
{

    //select database record

    global $conn;

    $select_query = "select * from category";
    $result_select = mysqli_query($conn, $select_query);
    while ($row_cat_data = mysqli_fetch_assoc($result_select)) {
        // code...

        $category_title = $row_cat_data['category_title'];
        $category_id = $row_cat_data['category_id'];
        echo "<li class='nav-item text-light'>
                            <a href='display_all.php?category=$category_id' class='nav-link'>$category_title</a></li>";
    }
}

//searching products function

function search_product()
{

    global $conn;

    //condition to check isset or not 

    if (isset($_GET['search_data_product'])) {
        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        $search_data_value = $sanitizer['search_data'];

        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results found!</h2>";
        }


        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $product_rating = $row['product_rating'];

            echo "<div class='col-sm-6 col-md-4 col-xl-3 mb-2 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' loading='lazy' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <div class='d-flex justify-content-between'>
                            <h5 class='card-title'>$product_title</h5>
                            <span><i class='bi bi-star-fill text-danger'></i>$product_rating</span>
                            </div>
                                <p class='card-text'>&#8358; $product_price</p>
                                <a href='display_all.php?add_to_cart=$product_id&qty=1' class='btn btn-primary theme_color_bg'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>View Details</a>
                            </div>
                        </div>
                    </div>";


        }
    }
}

//getting IP address function 

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $sanitizer['add_to_cart'];

        $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            $_SESSION['message'] = "Item already in cart";
            header('Location: display_all.php');
            ob_end_flush();
            //echo "<script>location.href='display_all.php';</script>";
        } else {
            if (isset($_GET['qty'])) {
                $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
                $qty = $sanitizer['qty'];
                $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip', $qty)";
                $result_query = mysqli_query($conn, $insert_query);
                $_SESSION['message'] = "Item added to cart successfully";
                header('Location: display_all.php');
                ob_end_flush();
                //echo "<script>location.href='display_all.php';</script>";
                
            } else {
                $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip', 1)";
                $result_query = mysqli_query($conn, $insert_query);
                $_SESSION['message'] = "Item added to cart successfully";
                header('Location: display_all.php');
                ob_end_flush();
                //echo "<script>location.href='display_all.php';</script>";
                
            }

        }
    }
}






// function to get cart item numbers

function cart_item()
{

    if (isset($_GET['add_to_cart'])) {
        $sanitizer = filter_var_array($_GET, FILTER_SANITIZE_STRING);
        global $conn;
        $ip = getIPAddress();

        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $ip = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function

function total_cart_price()
{
    global $conn;
    $ip = getIPAddress();
    $total = 0;
    $cart_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $qty = $row['quantity'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($conn, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array(($row_product_price['product_price']) * ($qty));
            $product_values = array_sum($product_price);
            $total += $product_values;
        }
    }
    echo "&#8358; " . $total;
}


//get user order details

function get_user_order_details()
{
    global $conn;
    $username = $_SESSION['username'];
    $get_details = "select * from `user_table` where username='$username'";
    $result_query = mysqli_query($conn, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_email = $row_query['user_email'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "Select * from `user_orders` where user_email='$user_email' and order_status='pending'";
                    $result_orders_query = mysqli_query($conn, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                            <p  class='text-center'><a href='profile.php?my_orders'>Order details</a></p>";
                    } else {
                        echo "<h3 class='text-center mt-4'>You have no pending order</h3>
                            <p class='text-center'><a href='../display_all.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }

        }
    }
}

                                ?>

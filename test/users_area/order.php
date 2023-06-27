<?php

include('../../private/autoload.php');
include('../functions/common_functions.php');

session_start();

if ($_GET['status'] != "success") {
    $_SESSION['message'] = "You have to make payment to proceed";
    
    echo "<script>location.href='checkout.php';</script>";
    exit();
} else {
    $get_ip_address = getIPAddress();
   $email = $_SESSION['email'];
    $reference = $_SESSION['reference'];
    $amount = $_SESSION['amount'];
    // getting total items and total price of all items

    
    $total_price = 0;
    $cart_query_price = "select * from `cart_details` where ip_address='$get_ip_address'";
    $result_cart_price = mysqli_query($conn, $cart_query_price);
    //$invoice_number = $reference;
    $status = 'pending';
    $count_products = mysqli_num_rows($result_cart_price);
    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $qty = $row_price['quantity'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $run_price = mysqli_query($conn, $select_products);
        while ($row_product_price = mysqli_fetch_array($run_price)) {
            $product_title = $row_product_price['product_title'];
            $product_cost = $row_product_price['product_price'] * $qty;
            $product_price = array(($row_product_price['product_price']) * ($qty));
            $product_values = array_sum($product_price);
            $total_price += $product_values;

            $insert_payment = "insert into `user_payments` (ip_address, invoice_number, amount, product_title, quantity, date) values ('$get_ip_address', '$reference', $product_cost, '$product_title', '$qty', NOW())";
            $result_payment = mysqli_query($conn, $insert_payment);

        }

       


        //orders pending

        $insert_pending_orders = "insert into `orders_pending` (user_email, invoice_number, product_id, quantity, order_status, date) values ('$email', '$reference', '$product_id', '$qty', '$status', NOW())";
        $result_pending_orders = mysqli_query($conn, $insert_pending_orders);

    }
    $insert_orders = "insert into `user_orders` (user_email, amount_due, invoice_number, total_products, order_date, order_status) values ('$email', '$amount', '$reference', '$count_products', NOW(), '$status')";
    $result_query = mysqli_query($conn, $insert_orders);

    //Remove cart items
    $empty_cart = "Delete from `cart_details` where ip_address='$get_ip_address'";
    $result_delete = mysqli_query($conn, $empty_cart);

    if ($result_delete) {
        $_SESSION['message'] = "Orders submitted successfully";
          
        echo "<script>location.href='profile.php';</script>";  

    }
}
?>

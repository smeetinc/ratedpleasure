<?php
require "../../private/autoload.php";
include "../functions/common_functions.php";
@session_start();
    if(isset($_POST['submit_details'])){
        $product_id = $_POST['product_id'];
        $qty = $_POST['qty'];
        global $conn;
        $ip = getIPAddress();

        $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            $_SESSION['message'] = "Item already in cart";
            header('Location: ../display_all.php');           
        } else {
                           
                $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($product_id, '$ip', $qty)";
                $result_query = mysqli_query($conn, $insert_query);
                $_SESSION['message'] = "item added to cart successfully";
                header('Location: ../display_all.php');
               
            }
        }
    
    ?>

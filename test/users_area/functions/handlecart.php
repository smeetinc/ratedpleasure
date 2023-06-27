<?php
session_start();

require "../../private/autoload.php";
include "common_functions.php";
if(isset($_POST['scope'])){
    
$scope = $_POST['scope'];
$ip = getIPAddress();
    echo 300;
switch($scope)
{
    case "add":
            $prod_id = $_POST['prod_id'];
            $prod_qty = $_POST['prod_qty'];

            $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$prod_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows > 0) {
                echo "existing";
            } else {
                $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($prod_id, '$ip', $prod_qty)";
                $result_query = mysqli_query($conn, $insert_query);

                if ($result_query) {
                    echo 201;
                } else {
                    echo 500;
                }
            }

        break;
        default:
            echo 500;

}
}else{
    echo 601;
}
 
?>
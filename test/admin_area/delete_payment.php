<?php
if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];
    $delete_payment = "delete from `user_payments` where payment_id=$delete_id";
    $result_payment = mysqli_query($conn, $delete_payment);
    if($result_payment){

        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments', '_self')</script>";
    }
} 
?>
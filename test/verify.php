<?php

include '../private/autoload.php';
include 'functions/common_functions.php';

  if(!$_GET['reference']){

  $_SESSION['message'] = "You are not authorized to view that page";
  
  echo "<script>location.href='index.php';</script>";
  exit;

 }else{
  
  $reference = $_GET['reference']; 
  session_start();

  $_SESSION['reference']=$reference;
    

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" .rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_03956c3c218794587b3929194111db7f26db438b",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $result = json_decode($response);

  }
 
  if($result->data->status == 'success'){

    $status = $result->data->status;
    $reference =$result->data->reference;
    $email = $result->data->customer->email;
    date_default_timezone_set('Africa/Lagos');
    $Date_time = date('m/d/Y h:i:s a', time());
    $amount =$result->data->amount;
    $finalAmount = $amount/100;
    
     
    $username = $_SESSION['username'];
    $user_address = $_SESSION['user_address'];
    $user_state = $_SESSION['user_state'];
    $user_mobile = $_SESSION['user_mobile'];
    $_SESSION['reference'] = $reference;
    $_SESSION['email'] = $email;
    $_SESSION['amount'] = $finalAmount;

    $get_ip_address = getIPAddress();
   


    //Insert into database

  $save = "INSERT INTO customer_transactions (username, user_mobile, user_address, user_state, user_email, ip_address, reference_number, amount_paid, status, date_paid) VALUES
  ('$username', '$user_mobile', '$user_address', '$user_state', '$email', '$get_ip_address', '$reference', '$finalAmount', '$status', NOW());";

  $result = mysqli_query($conn, $save);
 

    
    
    if(!$result){
      $_SESSION['message'] = "Error occured, contact admin for support".mysqli_error($conn);
      
      echo "<script>location.href='error.php';</script>";

      exit;
    }else{
      $_SESSION['message'] = "order placed successfully";
      
      echo "<script>location.href='users_area/order.php?status=success';</script>";
      $conn->close();
      exit;
    }
   

    


  }else{
    header("Location: error.php");
    exit;
  }
  
}

?>
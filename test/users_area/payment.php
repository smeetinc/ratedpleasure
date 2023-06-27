<?php
//Payment with paysatck
include('../../private/autoload.php');
include('../functions/common_functions.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FontAwesome Link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/main.css">

    <!---Swiperjs css -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">

</head>

<body>
    <?php
        $user_ip = getIPAddress();
    
        $user_email = $_SESSION['email'];
        $get_user = "Select * from `user_table` where user_email='$user_email'";
        $result = mysqli_query($conn, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
        $username = $run_query['username'];
        $user_email = $run_query['user_email'];
        $user_address = $run_query['user_address'];
        $user_state = $run_query['user_state'];
        $user_mobile = $run_query['user_mobile'];

                        if($user_state === 'ABUJA FCT') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'ABIA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'ADAMAWA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'AKWA IBOM') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'ANAMBRA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'BAUCHI') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'BAYELSA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'BENUE') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'BORNO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'CROSS RIVER') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'DELTA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'EBONYI') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'EDO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'EKITI') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'ENUGU') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'GOMBE') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'IMO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'JIGAWA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KADUNA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KANO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KATSINA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KEBBI') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KOGI') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'KWARA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'LAGOS ISLAND') {
                            $delivery_charges = 2000;
                        }else if ($user_state === 'LAGOS MAINLAND') {
                            $deliver_charges = 1000;
                        }else if($user_state === 'NASSARAWA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'NIGER') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'OGUN') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'ONDO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'OSUN') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'OYO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'PLATEAU') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'RIVERS') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'SOKOTO') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'TARABA') {
                            $delivery_charges = 3000;
                        }else if($user_state === 'YOBE') {
                            $delivery_charges = 3000;
                        }else{
                            $deliver_charges = 3000;
                        }

        

       
        $total = 0;
        $cart_query = "select * from `cart_details` where ip_address='$user_ip'";
        $result = mysqli_query($conn, $cart_query);
        $result_count = mysqli_num_rows($result);
        if ($result_count > 0) {

            while ($row = mysqli_fetch_array($result)) {
                $qty = $row['quantity'];
                $product_id = $row['product_id'];
                $select_products = "select * from `products` where product_id='$product_id'";
                $result_products = mysqli_query($conn, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                    $product_price = array(($row_product_price['product_price']) * ($qty));
                    $product_values = array_sum($product_price);
                    $total += $product_values;
                }
            }
        }


        ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <img src="../img/paystack1.png" alt="Paystack Image" class="pay_image mb-2">
            </div>
            <div class="col-md-6 text-center">
                <h1>Order Summary</h1>
                <h4>Please confirm your delivery address/total price of items before making payment</h4>
                <p><strong> Email:</strong> <?php echo $user_email; ?></p>
                <p><strong> Address:</strong> <?php echo $user_address; ?></p>
                <p><strong> State:</strong> <?php echo $user_state; ?></p>
                <p><strong> Mobile number:</strong> <?php echo $user_mobile; ?></p>
                <p class='text-muted'>Delivery charges: <strong>&#8358; <?php echo  $delivery_charges; ?> </strong></p>
                <p><strong> Total cost of item(s): &#8358; <?php echo $total; ?></strong></p>
                <h4>Total amount to be paid: <strong class='text-danger'>&#8358; <?php echo $net_total = ($total + $delivery_charges); ?></strong></h4>
                
                <br>
                <p class="text-muted fw-bold text-danger">If you want to edit your delivery information, click the button below.</p>
                <button class="btn btn-secondary my-3"><a href="profile.php?edit_account" class="nav-link">Edit Account Information</a></button>
                        <form id="paymentForm">
                    <button type="submit" onclick="payWithPaystack()" class="btn btn-success btn-outline-none"> Pay Now </button>
                </form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                   
            </div>
        </div>
    </div>
    <?php
    $_SESSION['username']=$username;
    $_SESSION['user_email']=$user_email;
    $_SESSION['user_address']=$user_address;
    $_SESSION['user_state']=$user_state;
    $_SESSION['user_mobile']=$user_mobile;
    $_SESSION['total']=$net_total;

    ?>




    <!--- Bootstrap cdn js link --->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>


    <!-- Swipper Js -->
    <script src="js/swiper-bundle.min.js"></script>

    <!---page script -->
    <script src="js/script.js"></script>
    <script>
    paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_a9712451c24879923801711ee668a00ebb143b09', // Replace with your public key
    email: '<?php echo $user_email; ?>',
    amount: '<?php echo $net_total*100; ?>',
    subaccount: 'ACCT_dhrm7j7mmqyehjq',
    bearer: 'subaccount',
    ref: 'RP'+Math.floor((Math.random() * 1000000000) + 1)+'NGN', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    username: '<?php echo $username; ?>',
            metadata: {
                custom_fields: [
                    {
                        display_name: "Usernmae",
                        variable_name: "username",
                        value: "<?php echo $username; ?>"
                    }
                ],
                
                 custom_fields: [
                    {
                        display_name: "Phone Number",
                        variable_name: "user_mobile",
                        value: "<?php echo $user_mobile; ?>"
                    }
                 ],
                 custom_fields: [
                    {
                        display_name: "Address",
                        variable_name: "user_address",
                        value: "<?php echo $user_address; ?>"
                    }
                ]
            },
        

        onClose: function(){
        //window.location = "http://localhost/ratedpleasure/test/users_area/payment.php?transaction=call";
      alert('Transaction cancelled');
    },
    callback: function(response){
      //  const referenced = response.reference;
        //window.location.href='success.php?successfullypaid='+referenced;
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location = "http://localhost/ratedpleasure/test/verify.php?reference="+response.reference;
    }
  });
  handler.openIframe();

}
    
   </script>
</body>

</html>
<?php 
require "../../private/autoload.php";
include "../functions/common_functions.php";
@session_start();

if(isset($_SESSION['username'])){
    $_SESSION['message'] = "You're already logged in";
    header('Location: profile.php');
    exit();

}

//include "../header.php";
?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RatedPleasure</title>

        <!-- Bootstrap Css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <!-- FontAwesome Link -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="../css/main.css">

        <!---Swiperjs css -->
        <link rel="stylesheet" href="../css/swiper-bundle.min.css">

        
    </head>

<main>
    <section class="fourth-section m-4">
        

                    <div class="container-fluid my-3">
                        <h2 class="text-center">User Login</h2>
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-lg-12 col-xl-6">
                            <?php if(isset($_SESSION['message'])) { ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey! </strong><?= $_SESSION['message']; ?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>

<?php
unset($_SESSION['message']);
}
?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <!--- Username Field-->
                                    <div class="form-outline mb-4">
                                        <label for="user_email" class="form-label">Email</label>
                                        <input type="email" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                                    </div>
                                                                     
                                    <!--- Password Field-->
                                    <div class="form-outline mb-4">
                                        <label for="user_password" class="form-label">Password</label>
                                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                                    </div>
                                                                      
                                    <div class="mt-4 pt-2">
                                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a> </p>
                                    </div>
                                </form>
                            </div>
                        </div>



                        


                    </div>
               


    </section>





</main>
<!--- Bootstrap cdn js link --->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!-- Swipper Js -->
<script src="js/swiper-bundle.min.js"></script>

<!---page script -->
<script src="js/script.js"></script>

<?php 
  
  if(isset($_POST['user_login'])){
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

    $select_query = "select * from `user_table` where user_email='$user_email'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart login logic

    $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";

    $select_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);


    if($row_count>0){
        $_SESSION['email'] = $user_email;
        $username = $row_data['username'];
        $_SESSION['username'] = $username;
        if(password_verify($user_password, $row_data['user_password'])){
            //echo "<script>alert('Login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                //session_regenrate_id(true);
                $_SESSION['email'] = $user_email;
                $_SESSION['username'] = $username;
                $_SESSION['message'] = "Login successful";
                echo "<script>location.href='profile.php';</script>";
                
            }else{
                //session_regenrate_id(true);
                $_SESSION['email'] = $user_email;
                $_SESSION['username'] = $username;
                $_SESSION['message'] = "Login successful, you can proceed with the payment of the items in your cart now.";
                
                echo "<script>location.href='checkout.php';</script>";
             
            }

        }else{
            $_SESSION['message'] = "invalid credentials";
            echo "<script>location.href='user_login.php';</script>";
        }
    }else{
        $_SESSION['message'] = "invalid credentials";
        
        echo "<script>location.href='user_login.php';</script>";
    }
  }
  ?>
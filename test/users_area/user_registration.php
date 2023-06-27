<?php
//require "../../private/autoload.php";
// include "../functions/common_functions.php";
include "header.php";
@session_start();

if (isset($_SESSION['username'])) {
    $_SESSION['message'] = "You're already logged in";
    
    echo "<script>location.href='profile.php';</script>";
    exit();

}


?>



<main>
    <section class="fourth-section m-4">


        <div class="container-fluid my-3">
            <h2 class="text-center">New User Registration</h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <?php if (isset($_SESSION['message'])) { ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey! </strong>
                        <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>

                    <?php
                                unset($_SESSION['message']);
                            }
                            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!--- Username Field-->
                        <div class="form-outline mb-4">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" id="user_username" class="form-control" placeholder="Enter your Username"
                                autocomplete="off" required="required" name="user_username">
                        </div>
                        <!--- Email Field-->
                        <div class="form-outline mb-4">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                                autocomplete="off" required="required" name="user_email">
                        </div>
                        <!--- Image Field-->
                        <div class="form-outline mb-4">
                            <label for="user_image" class="form-label">Upload Image</label>
                            <input type="file" id="user_image" class="form-control" required="required"
                                name="user_image">
                        </div>
                        <!--- Password Field-->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" id="user_password" class="form-control"
                                placeholder="Enter your password" autocomplete="off" required="required"
                                name="user_password">
                        </div>
                        <!--- Confirm password Field-->
                        <div class="form-outline mb-4">
                            <label for="conf_user-password" class="form-label">Confirm password</label>
                            <input type="password" id="conf_user_password" class="form-control"
                                placeholder="Confirm password" autocomplete="off" required="required"
                                name="conf_user_password">
                        </div>
                        <!--- Address Field-->
                        <div class="form-outline mb-4">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                                autocomplete="off" required="required" name="user_address">
                        </div>
                         <!--- Address Field-->
                         <div class="form-outline mb-4">
                            <label for="user_state" class="form-label">State</label>
                            <select type="text" id="user_state" class="form-select" required="required" name="user_state">
                               
                            <option selected disabled value="">Select your state? </option>
    <option value="ABUJA FCT">ABUJA FCT</option>
    <option value="ABIA">ABIA</option>
    <option value="ADAMAWA">ADAMAWA</option>
    <option value="AKWA IBOM">AKWA IBOM</option>
    <option value="ANAMBRA">ANAMBRA</option>
    <option value="BAUCHI">BAUCHI</option>
    <option value="BAYELSA">BAYELSA</option>
    <option value="BENUE">BENUE</option>
    <option value="BORNO">BORNO</option>
    <option value="CROSS RIVER">CROSS RIVER</option>
    <option value="DELTA">DELTA</option>
    <option value="EBONYI">EBONYI</option>
    <option value="EDO">EDO</option>
    <option value="EKITI">EKITI</option>
    <option value="ENUGU">ENUGU</option>
    <option value="GOMBE">GOMBE</option>
    <option value="IMO">IMO</option>
    <option value="JIGAWA">JIGAWA</option>
    <option value="KADUNA">KADUNA</option>
    <option value="KANO">KANO</option>
    <option value="KATSINA">KATSINA</option>
    <option value="KEBBI">KEBBI</option>
    <option value="KOGI">KOGI</option>
    <option value="KWARA">KWARA</option>
    <option value="LAGOS ISLAND">LAGOS (ISLAND)</option>
    <option value="LAGOS MAINLAND">LAGOS (MAINLAND)</option>
    <option value="NASSARAWA">NASSARAWA</option>
    <option value="NIGER">NIGER</option>
    <option value="OGUN">OGUN</option>
    <option value="ONDO">ONDO</option>
    <option value="OSUN">OSUN</option>
    <option value="OYO">OYO</option>
    <option value="PLATEAU">PLATEAU</option>
    <option value="RIVERS">RIVERS</option>
    <option value="SOKOTO">SOKOTO</option>
    <option value="TARABA">TARABA</option>
    <option value="YOBE">YOBE</option>
    <option value="ZAMFARA">ZAMFARA</option>
                               
                            </select>
                        </div>
                        <!--- Contact Field-->
                        <div class="form-outline mb-4">
                            <label for="user_contact" class="form-label">Mobile number</label>
                            <input type="text" id="user_contact" class="form-control"
                                placeholder="Enter your mobile number" autocomplete="off" required="required"
                                name="user_contact">
                        </div>
                        <div class="mt-4 pt-2">
                            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0"
                                name="user_register">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php"
                                    class="text-danger"> Login</a> </p>
                        </div>
                    </form>
                </div>
            </div>






        </div>



    </section>





</main>
<?php
require "../footer.php";

//Inserting script
if (isset($_POST['user_register'])) {
    $user_username = mysqli_real_escape_string($conn, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = mysqli_real_escape_string($conn, $_POST['conf_user_password']);
    $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
    $user_state = mysqli_real_escape_string($conn, $_POST['user_state']);
    $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    $ImgType = strtolower(substr($user_image, strpos($user_image, '.') + 1));
    $size = $_FILES['user_image']['size'];
    $max_size = 2097152;

    if ($size > $max_size) {
        $_SESSION['message'] = "Your picture size is more than 2MB, consider reducing the file size";
        
        echo "<script>window.open('user_registration.php', '_self');</script>";

        die;
    }


    // Allow certain file formats
    if (
        $ImgType != "jpg" && $ImgType != "png" && $ImgType != "jpeg"
        && $ImgType != "gif"
    ) {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        
        echo "<script>window.open('user_registration.php', '_self');</script>";


        die();


    }

    //select query

    $select_query = "select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        $_SESSION['message'] = "username/email already exist";
        
        echo "<script>window.open('user_registration.php', '_self');</script>";

    } else if ($user_password != $conf_user_password) {
        $_SESSION['message'] = "Password do not match";
        echo "<script>window.open('user_registration.php', '_self');</script>";

    } else {
        // insert_query
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_state, user_mobile) values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_state', '$user_contact') ";
        $sql_execute = mysqli_query($conn, $insert_query);
        if ($sql_execute) {

            // echo "<script>alert('Data inserted successfully')</script>";
            //selecting cart items
            $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
            $result_cart = mysqli_query($conn, $select_cart_items);
            $rows_count = mysqli_num_rows($result_cart);
            if ($rows_count > 0) {
                $_SESSION['username'] = $user_username;
                $_SESSION['email'] = $user_email;
                $_SESSION['message'] = "Registration successful. You have some items in your cart, you can proceed to pay now";
                
                echo "<script>window.open('checkout.php', '_self');</script>";
                
            } else {
                $_SESSION['username'] = $user_username;
                $_SESSION['email'] = $user_email;
                $_SESSION['message'] = "Registration successful. Welcome to your profile.";
                
                echo "<script>window.open('profile.php', '_self');</script>";
                
            }

        } else {
            
            $_SESSION['message'] = "Error occured!";
            
            echo "<script>window.open('../error.php', '_self');</script>";
            
        }
    }

}
?>
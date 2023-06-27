<?php 
require "../../private/autoload.php";
include "../functions/common_functions.php";
@session_start();

if(isset($_SESSION['username'])){
    $_SESSION['message'] = "You're already logged in";
    header('Location: index.php');
    exit();

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <mata name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Registration</title>
            <!-- Bootstrap Css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- FontAwesome Link -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Fonts -->
<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Styles -->
<link rel="stylesheet" href="../css/main.css">
<style>
    body{
        overflow-x: hidden;
    }
</style>
    </head>
    <body>

<div class="container-fluid mt-4">
<h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center ">
    <div class="col-md-6 col-xl-5">
        <img src="../img/adminreg.jpg" alt="Admin registration" class="img-fluid">
    </div>
    <div class="col-md-6 col-xl-4">
    <?php if(isset($_SESSION['message'])) { ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey! </strong><?= $_SESSION['message']; ?>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>

<?php
unset($_SESSION['message']);
}
?>
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required="required">
            </div>
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" required="required">
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required="required">
            </div>
            <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter your password again" required="required">
            </div>
            <div>
                <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_register" value="Register">
                <p class="small fw-bold mt-2 pt-1">Have an account ? <a href="admin_login.php" class="text-danger">Login</a></p>
            </div>
        </form>
    </div>

</div>
</div>


        <?php
        include('footer.php');

        //Inserting script
if (isset($_POST['admin_register'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hash_password = mysqli_real_escape_string($conn, password_hash($password, PASSWORD_DEFAULT));
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);


            //select query
        
            $select_query = "select * from `admin_table` where username='$username' or email='$email'";
            $result = mysqli_query($conn, $select_query);
            $rows_count = mysqli_num_rows($result);
            if ($rows_count > 0) {
                $_SESSION['message'] = "username/email already exist";
                header('Location: admin_registration.php');
            } else if ($password != $confirm_password) {
                $_SESSION['message'] = "Password do not match";
                header('Location: admin_registration.php');
            } else {
                // insert_query
        
                $insert_query = "insert into `admin_table` (username, email, password) values ('$username', '$email', '$hash_password')";
                $sql_execute = mysqli_query($conn, $insert_query);
                if ($sql_execute) {
                    $_SESSION['message'] = "Data inserted successfully, you will be redirected to your dashboard now";
                    header('Location: index.php');
                    
                    $_SESSION['username'] = $username;
                    // echo "<script>window.open('index.php', '_self')</script>";
                } else {
                    $_SESSION['message'] = "Error! Try to register again";
                    header('Location: error.php');
                }
            }
        }
  
    ?>
    </body>
</html>


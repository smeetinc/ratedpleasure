<?php

@session_start();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome <?php echo $_SESSION['username']; ?></title>

    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FontAwesome Link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- F<li class='nav-item'>
                        <a class='nav-link' href='logout.php'>Logout</a>
                    </li>onts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/main.css">

    <!---Swiperjs css -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">

    <style>
        sup {
            z-index: 1000;
            top: -0.2em;
        }
        .profile_img{
        width:50%;
        height: 50%;
        object-fit: contain;
    }

    </style>


</head>

<body>
</body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>
    <?php
    $username_session =$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query = "Delete from `user_table` where username='$username_session'";
        $result = mysqli_query($conn, $delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account deleted successfully!')</script>";
            echo "<script>window.open('../index.php', '_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php', '_self')</script>";
    }

    ?>

</html>
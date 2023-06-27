<?php
require "../../private/autoload.php";

session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_order ="select * from `user_orders` where order_id = $order_id";
    $result = mysqli_query($conn, $select_order);

}
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

<body class="bg-secondary">
</body>
</html>
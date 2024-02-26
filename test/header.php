<?php /*
require "../private/autoload.php";
include "functions/common_functions.php";
session_start();
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description"
        content="Ratedpleasure is the nigerian website for all things sexual toys related, we offer you affordable, top quality toys and other accessories to enhance your sex life">
    <meta name="keywords"
        content="ratedpleasure, pleasure, rated, 18+, adult, toys, sex, sex life, orgasm, masturbate, self love, hot, dildo, bdsm kit, adult toys, male, female, oils, lubricants, lube, viagra, condom, flavours, vibrator, butt plug, clips, nigeria, Nigeria, online store, home delivery, descrete service, privacy">
    <meta name="author" content="www.ratedpleasure.com">

    <title>RatedPleasure</title>

    <meta property="og:title" content="RtaedPleasure" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="www.ratedpleasure.com" />
    <meta property="og:image" content="www.ratedpleasure.com/img/logo4.png" />
    <meta property="og:description"
        content="Ratedpleasure is the nigerian website for all things sexual toys related, we offer you affordable, top quality toys and other accessories to enhance your sex life" />


    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


    <!-- FontAwesome Link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--- AlertifyJs CSS--->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="css/main.css">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta name="msapplication-TileColor" content="#c9cde3">
    <meta name="msapplication-config" content="img/browserconfig.xml">
    <meta name="theme-color" content="#ad5d5d">



    <style>
    .cart_img {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }

    body {
        overflow-x: hidden;
    }
    </style>


</head>

<body>
    <!-- Navbar here -->
    <div class="container-fluid p-0 fixed-top">
        <!-- first child -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <a href="index.php"><img src="img/logo3.png" alt="site logo" class="logo-nav me-3 logo"></a>
                <div class="d-block d-md-none">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">
                                    <sup class="text-danger"><?php cart_item(); ?></sup></i>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">PRODUCTS</a>
                        </li>
                        <?php
                            if(isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                        <a class='nav-link' href='users_area/profile.php'>MY ACCOUNT</a>
                                        </li>";
                            }else{
                                echo "<li class='nav-item'>
                                        <a class='nav-link' href='users_area/user_registration.php'>REGISTER</a>
                                        </li>";
                            }

                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">CONTACT</a>
                        </li>
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping">
                                    <sup class="text-danger"><?php cart_item(); ?></sup></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?></a>
                        </li>
                        <li class="nav-link ms-2 d-none d-lg-block fw-bold"> | </li>
                        <li class="nav-item ms-3">
                            <?php 
                            /* if(!isset($_SESSION['username'])){
                                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                                }else{
                                    echo "<li class='nav-item'>
                                            <a class='nav-link' href='users_area/profile.php'>Welcome ".$_SESSION['username']."</a>
                                            </li>";
                                } */
             
                                if(!isset($_SESSION['username'])){
                                    echo "<li class='nav-item'><a class='nav-link fw-bold' href='users_area/user_login.php'>Login</a></li>";
                                }else{
                                    echo "<li class='nav-item'>
                                        <a class='nav-link btn btn-danger fw-bold' href='users_area/logout.php'>Logout</a>
                                        </li>";
                                }
                        ?>
                        </li>
                    </ul>
                    <form action="search_product.php" method="get" class="d-flex">

                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data" id="search">

                        <!-- <button class="btn btn-outline-light" type="submit">Search</button>-->
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                    <div class="d-block d-md-none">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <hr class="theme_color_text fw-bold">
                            <li class="nav-item text-light">
                                <a href="category.php" class="nav-link">
                                    <h4>View all categories</h4>
                                </a>
                            </li>
                            <hr class="theme_color_text fw-bold">


                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!--- Calling cart function -->
        <?php 
            cart();
        ?>


    </div>
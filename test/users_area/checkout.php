<?php 

session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RatedPleasure</title>

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

    <!-- Styles -->
    <link rel="stylesheet" href="css/main.css">

  

    <style>
.cart_img {
    width: 80px;
    height: 80px;
    object-fit: contain;
}
</style>


</head>

<body>
    <!-- Navbar here -->
    <div class="container-fluid p-0 fixed-top">
        <!-- first child -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <img src="../img/logo3.png" alt="site logo" class="logo-nav me-3 logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">PRODUCTS</a>
                        </li>
                        <?php
          if(isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php'>MY ACCOUNT</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='user_registration.php'>REGISTER</a>
          </li>";
          }

        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">CONTACT</a>
                        </li>
                        <li class="nav-link ms-2 d-none d-lg-block fw-bold"> | </li>
                        <li class="nav-item ms-3">
                        <?php 
                    /* if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."</a>
                    </li>";
                    } */
             
                    if(!isset($_SESSION['email'])){
                        echo "<li class='nav-item'><a class='nav-link fw-bold' href='user_login.php'>Login</a></li>";
                    }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link btn btn-danger fw-bold' href='logout.php'>Logout</a>
                    </li>";
                    }
                ?>
                        </li>
                        
                    </ul>
                    <form action="../search_product.php" method="get" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">

                        <!-- <button class="btn btn-outline-light" type="submit">Search</button>-->
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
     


    </div>


   


    
    <main>
        <section class="fourth-section m-4">


            <div class="container">

                <div class="row px-1">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                                        if(!isset($_SESSION['email'])){
                                            include ('user_login.php');
                                        }else{
                                            include('payment.php');
                                        }
                                    ?>
                        </div>

                    </div>



                </div>


            </div>



        </section>





    </main>
    <?php 
  require "footer.php";
  ?>
<?php
include "header.php";
@session_start();

 if (!isset($_SESSION['username'])) {
	 echo "<script>alert('Page restricted, login to proceed')</script>";
	 
    echo "<script>location.href='user_login.php';</script>";
 }
?>
    <main>
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center">
                    <li class="nav-item theme_color_bg">
                        <a class="nav-link text-light" href='#'>
                            <h4 class="py-3">My profile</h4>
                        </a>
                    </li>
                    <?php
                        $username = $_SESSION['username'];
                        $user_image ="Select * from `user_table` where username='$username'";
                        $result_image = mysqli_query($conn, $user_image);
                        $row_image = mysqli_fetch_array($result_image);
                        $user_image = $row_image['user_image'];
                        echo "<li class='nav-item'>
                        <div class='my-3'>
                            <img src='./user_images/$user_image' class='img-fluid' alt='$user_image'>
                        </div>
                    </li>";
                    ?>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-light" href='profile.php'>
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href='profile.php?edit_account'>
                            Edit Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href='profile.php?my_orders'>
                            My Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href='profile.php?delete_account'>
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item mt-4 theme_color_bg py-3">
                        <a class="nav-link text-light" href='logout.php'>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                    }
                ?>
            </div>
        </div>




    </main>
    <?php
require "footer.php";
?>
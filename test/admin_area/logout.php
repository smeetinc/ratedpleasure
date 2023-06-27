<?php
session_start();
session_unset();
session_destroy();


$_SESSION['message'] = "You are logged out! Login again to continue";
header('Location: admin_login.php');
?>
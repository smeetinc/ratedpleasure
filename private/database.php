<?php
define('DB_NAME', 'ratedpleasure_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

if (!$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)){

	die("Fail to connect");
}
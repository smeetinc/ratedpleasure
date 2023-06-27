<?php

if(isset($_POST['register'])) {

	include_once 'dbh.inc.php';

	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Checking for empty fields
	if(empty($uid)||empty($pwd)){
		header("Location: ../signup.php?signup=empty(var)");
		exit();
	}else{
		//Check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $uid)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		
			}else{
				//if username already exist
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location: ../signup.php?signup=usertaken");
		exit();
				}else{
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_uid, user_pwd) VALUES ('$uid', '$hashedPwd')";
					mysqli_query($conn, $sql);
					header("Location: ../index.php?signup=success");
		exit();
				}
			}
		}
	
}else{
	header("Location: ../index.php");
	exit();
}
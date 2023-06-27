<?php
/*

//logic for login page

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['login'])){
	print_r($_POST);

	//include 'database.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Error handlers
	//Checking for empty fields

	if(empty($email) || empty($password)){
		$_SESSION['message']= "Empty input field(s)";
		header("Location: ../public/login.php?emptyinput");
		exit();
	}else{
		//checking if username exist
		$sql = "SELECT * FROM users WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck == 0){
					$_SESSION['message']= "No user with that username or email";
					header("Location: ../public/login.php?invaliduser");
					exit();
	} else{
		if($row = mysqli_fetch_assoc($result)){
			//De-hashing password
			$hashedPwdCheck = password_verify($password, $row['password']);
			if($hashedPwdCheck == false){
				$_SESSION['message']= "Password not correct";
				header("Location: ../public/login.php?login=passwordnotcorrect");

					exit();
			}elseif ($hashedPwdCheck == true) {
				//Log in the user
				$_SESSION['first'] = $row['first'];
				$_SESSION['last'] = $row['last'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['logged_in'] = true;
				header("Location: ../public/course/1/1.php");
					exit();

			}
		}
	}
}

}
// Logic for sign up page
/*else if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['register'])) {

	include_once 'database.php';

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
*/
/*
else{
	$_SESSION['message']= "You can't view this page content without logging in";
	header("Location: ../public/error.php");
	exit();
}
*/
?>
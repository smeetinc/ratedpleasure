<?php

//require '../../private/autoload.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
	print_r($_POST);
}
	/*

	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Checking for empty fields

	if(empty($uid) || empty($pwd)){
		$_SESSION['message']= "Empty input field(s)";
		header("Location: ../login.php?emptyinput");
		exit();
	}else{
		//checking if username exist
		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck == 0){
					$_SESSION['message']= "No user with that username or email";
					header("Location: ../login.php?invaliduser");
					exit();
	} else{
		if($row = mysqli_fetch_assoc($result)){
			//De-hashing password
			$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
			if($hashedPwdCheck == false){
				$_SESSION['message']= "Password not correct";
				header("Location: ../login.php?login=passwordnotcorrect");

					exit();
			}elseif ($hashedPwdCheck == true) {
				//Log in the user
				$_SESSION['u_id'] = $row['user_id'];
				$_SESSION['u_first'] = $row['user_first'];
				$_SESSION['u_last'] = $row['user_last'];
				$_SESSION['u_email'] = $row['user_email'];
				$_SESSION['u_uid'] = $row['user_uid'];
				$_SESSION['logged_in'] = true;
				header("Location: ../course.php");
					exit();

			}
		}
	}
}

}else{
	$_SESSION['message']= "You can't view this page content without logging in";
	header("Location: ../error.php");
	exit();
}
*/
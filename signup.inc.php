<?php 
if (isset($_POST['signup-submit'])) {
	# code...
	include 'dbh.inc.php' ;

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

 	if (empty($username) || empty($email) ||empty($password) ||empty($passwordRepeat) ) {
 		header("location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
 		exit();
 		# code...
 	}
 	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
 		header("location: ../signup.php?error=invalidmail&uid") ;
 		exit() ;
 	}
 	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 		# code...
 		header("location: ../signup.php?error=invalidmail&uid=".$username);
 		exit();
 	}
 	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
 		# code...
 		header("location: ../signup.php?error=invaliduid&mail=".$email);
 		exit();
 	}
 	elseif ($password !== $passwordRepeat) {
 		header("location: ../signup.php?error=passwordchack&uid=".$username.$email);
 		exit();
 	}
 	else{
 		$sql = "SELECT uidusers FROM users WHERE uidusers=?";
 		$stmt = mysqli_stmt_init($conn);
 		if(!mysqli_stmt_prepare($stmt, $sql)){
 			header("location: ../signup.php?error=sqlerror");
 		exit();

 		}
 		else {
 			mysqli_stmt_bind_param($stmt, "s", $username);
 			mysqli_stmt_execute($stmt);
 			mysqli_stmt_store_result($stmt);
 			$resultCheck = mysqli_stmt_num_rows($stmt);
 			if ($resultCheck > 0) {
 				header("location: ../signup.php?error=usertaken&mail= ".$email);
 			}
 			else{
 				$sql = "INSERT INTO users (uidusers, emailusers, pwdusers) VALUE (?, ? ,?)";
 				$stmt = mysqli_stmt_init($conn);
 				if(!mysqli_stmt_prepare($stmt, $sql)){
 					header("location: ../signup.php?error=sqlerror");
 					exit();

 				}
 				else {
 					$hashPwd = password_hash($password, PASSWORD_DEFAULT);
 					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashPwd);
 					mysqli_stmt_execute($stmt);
 					mysqli_stmt_store_result($stmt);
 					header("location: ../signup.php?signup=success");

 				}
 			}
 			# code...
 		}
 	}
 	mysqli_stmt_close($stmt);
 	mysqli_close($conn);

}
else{
	header("location: ../signup.php");
	exit();
}
?>
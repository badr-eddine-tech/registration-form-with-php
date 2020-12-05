<?php 

if(isset($_POST['login-submit'])){
	
	include 'dbh.inc.php'
	
	
	$password = $_POST['pwd'];
	$Email    = $_POST['mailuid'];

	if (empty($Email) ||empty($password)) {
		header("location: ../index.php?error=emptyfields");
 		exit();
		# code...
	}
	else {
		$sql = "SELECT  * FROM users WHERE uidusers=? OR emailusers=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
 			header("location: ../index.php?error=sqlerror");
 			exit();
			
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $Email, $Email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$passChech = password_verify($password, $row['pwdusers']);
				if ($passCheck == false ) {
					# code...
					header("location: ../index.php?error=wrongpwd");
 					exit();
				}
				elseif ($password == true) {
					 session_start();
					 $_SESSION['userId'] = $row['idusers']
					  $_SESSION['userUid'] = $row['uidusers']
					  header("location: ../index.php?login=success");
 					exit();
				}
				else{
					header("location: ../index.php?error=wrongpwd");
 					exit();
				}
			}
			else{
				header("location: ../index.php?error=nouser");
 				exit();

			}
		}
	}
 }

 else {
 	header("location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
 		exit();
 }

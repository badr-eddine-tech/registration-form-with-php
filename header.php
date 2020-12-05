<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<header>
		<nav>
			<div>
				<a href="#"><img src=""></a>
				<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="username/E-mail...">
					<input type="password" name="pwd" placeholder="Password...">
					<button type="submit" name="login-submit">login</button>
				</form>
				<a href="signup.php">signup</a>
				<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">logout</button>
				</form>
			</div>

		</nav>
	</header>
</body>
</html>
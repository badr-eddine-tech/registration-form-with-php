<?php 
	include "header.php";
 ?>

 	<menu>
 		<nav>
			<div>
				<a href="#"><img src=""></a>
				<form action="includes/signup.inc.php" method="post">
					<input type="text" name="uid" placeholder="username">
					<input type="text" name="mail" placeholder="E-mail">
					<input type="password" name="pwd" placeholder="Password...">
					<input type="password" name="pwd-repeat" placeholder="repeat Password...">
					<button type="submit" name="signup-submit">singup</button>
				</form>
			</div>
		</nav>
 	</menu>

 <?php 
 	include "footer.php";
 	 ?>
<?php 
	include "header.php";
 ?>

 	<menu>
 		<?php 
 		if (isset($_SESSION['userId'])) {
 			echo '<p>You are logged in</p>';
 		 	# code...
 		 } else {
 		 	echo '<p>You are logged out</p>';
 		 }
 		 ?>
 		
 	</menu>

 <?php 
 	include "footer.php";
 	 ?>
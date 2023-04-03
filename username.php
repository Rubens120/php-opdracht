<section class="post">
	<?php
		$get_all_user = $conn->prepare("SELECT * FROM user");
		$get_all_user->execute();
		$user = $get_all_user->fetchAll();
		
			echo "<div class='username'>" . $user["username"] . "</div>";
	?>

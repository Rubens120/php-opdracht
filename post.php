	<?php
		$get_all_tweets = $conn->prepare("SELECT * FROM tweets");
		$get_all_tweets->execute();
		$tweets = $get_all_tweets->fetchAll();

		foreach ($tweets as $tweet) {
			echo "<div class='content'>" . $tweet["body"] . "</div>"; 
		}
			
	?>
</section>
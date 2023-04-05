<?php
    include "connect.php";

    if(isset($_POST['submit'])) {
        $body = filter_input(INPUT_POST, "tweetbox", FILTER_SANITIZE_STRING) ;

        $insert_body= $conn->prepare("INSERT INTO tweets(body) VALUES (:body)");
        $insert_body->bindParam(":body", $_POST["body"]);
        $insert_body->execute();
        
        if (empty($body)) {
            echo "De tweetbox is leeg.";
        } else {
            echo "het is gelukt!";
        }
    }   echo "<br>";
?>x
<?php

$username = "root";
$password = "";

try {
    $conn =  new PDO("mysql:host=localhost;dbname=chirpifydb", $username, $password);

    $get_tweets = $conn->prepare(query:"SELECT * FROM tweet");
    $get_tweets->execute();
    $tweets = $get_tweets->fetchAll();

    foreach ($tweets as $tweet) {
        echo "<div class='tweets'>" . $tweet["body"] . "</div><br>";
    }

} catch(PDOException $error) {
    echo $error->getMessage();
}

?>
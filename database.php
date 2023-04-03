<?php
$username = "root";
$password = "";

try {
    $conn =  new PDO("mysql:host=localhost;dbname=twitter_clone", $username, $password,);

    $quary = $conn->prepare(query:"SELECT * FROM user");
    $quary->execute();
    $result = $quary->fetchAll (PDO::FETCH_ASSOC);

    

} catch(PDOException $error) {
    echo $error->getMessage();
}

?>
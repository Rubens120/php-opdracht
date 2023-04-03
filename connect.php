<?php
try{
    $conn = new  PDO ("mysql:host=localhost;dbname=chirpify",
    "root", "");
} catch(PDOException $e){
    die("Error!: " . $se->getMessage());
}
?>
<?php
include "connect.php";  
if(isset($_POST['Registreren'])){
  $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
  $gebruikersnaam = filter_input(INPUT_POST, "gebruikersnaam", FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$encrypted_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$insert_user = $conn->prepare("INSERT INTO users(naam, gebruikersnaam, password)VALUES(:naam, :gebruikersnaam, :password)");
$insert_user->bindParam(":naam", $_POST["naam"]);
$insert_user->bindParam(":gebruikersnaam", $_POST["gebruikersnaam"]);
$insert_user->bindParam(":password", $encrypted_password);
$insert_user->execute();
  // Validate required fields
  if(empty($naam) || empty($gebruikersnaam) || empty($password)) {
    echo "Vul alle verplichte velden in.";
  } else {
  
    echo "Uw account is aangemaakt";
   }  
   echo "<br>";
   
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <div>
      <form method="post" action="" >
      <label for="naam">name:</label>
        <input type="text" id="naam" name="naam">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam">
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password">

        <input type="submit" name="Registreren">
      </form>
  </div>
      </body>
      </html>
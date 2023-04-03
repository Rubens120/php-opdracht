<?php
include("connect.php");

if(isset($_POST['login'])){
    $gebruikersnaam = filter_input(INPUT_POST,"gebruikersnaam",
        FILTER_SANITIZE_STRING);
    $password = $_POST ['password'];
    $query = $conn-> prepare("SELECT * FROM users WHERE gebruikersnaam = :user");
    $query->bindParam("user", $gebruikersnaam);
    $query->execute();
    if($query->rowCount() == 1){
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $result["password"])){
            echo "Welcome gebruiker";
            header("Location: profile.php");
            exit;
        }
        else{
            echo "het wachtwoord of gebruikersnaam is fout";
        }

    }
    else {
        echo "het wachtwoord of gebruikersnaam is fout";
    }
    echo "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <label>gebruikersnaam</label>
    <input type="text" name="gebruikersnaam">

    <label>wachtwoord</label>
    <input type="password" name="password">

    <input type="submit" name="login" value="login">  
</form>
</body>
</html>
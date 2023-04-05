<?php
include "connect.php";

if(isset($_POST['update']))
{
    $naam = $_POST['naam'];
    $gebruikersnaam = $_POST['gebruikernaam'];
    $password = $_POST['password'];
    
    
    $query = "UPDATE `users` SET `naam`=:naam, `gebruikersnaam`=:gebruikersnaam,`password`=:password WHERE `naam` = :naam, `gebruikersnaam` = :naam, `password` = :password";
    
    $pdoResult = $conn->prepare($query);
    
    $pdoExec = $pdoResult->execute(array(":naam"=>$naam,":gebruikersnaam"=>$gebruikersnaam,":password"=>$password,));
    
    if($pdoExec)
    {
        echo 'Data Updated';
    }else{
        echo 'ERROR Data Not Updated';
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include "header.php";?>
        
        <form action="update.php" method="post">
            <input type="text" name="naam" required placeholder="naam"><br><br>
            <input type="text" name="gebruikersnaam" required placeholder="gebruikersnaam"><br><br>
            <input type="text" name="password" required placeholder="password"><br><br>
            <input type="submit" name="update" required placeholder="Update Data">
        </form>
    </body>
</html>
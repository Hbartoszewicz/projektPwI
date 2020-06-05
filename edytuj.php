<?php

try{
$conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
}
catch(PDOException $e){
    die("Błąd połączenia " . $e->getMessage());
}

$warunek = true;
session_start();  
if(strlen($_POST["tresc"]) > 500  ){
    echo "Artykul jest za dlugi (powyzej 500 znakow).<br> <a href=\"07.php\">Powrot</a>";
    $warunek = false;
}
if($warunek)
{
    $stmt = 'Update artykul set tresc = :tresc WHERE id = :id';
    $stmt = $conn->prepare($stmt);
    $stmt->bindValue(':tresc', $_POST["tresc"], PDO::PARAM_STR);
    $stmt->bindValue(':id', $_POST["artykul2"], PDO::PARAM_INT);
    $stmt->execute();
    echo "Edytowano <br> <a href=\"07.php\">Powrot</a>";
}
    ?>
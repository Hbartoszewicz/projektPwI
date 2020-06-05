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
        echo "Artykul jest za dlugi (powyzej 500 znakow).<br> <a href=\"06.php\">Powrot</a>";
        $warunek = false;
    }
    if(strlen($_POST["tresc"]) == 0  ){
        echo "Brak tresci.<br> <a href=\"06.php\">Powrot</a>";
        $warunek = false;
    }
    if( $warunek){
$stmt=$conn->prepare("INSERT INTO artykul (tytul, tresc, user_id) VALUES (?, ?, ?)");
$stmt->bindValue(1, $_POST["tytul"], PDO::PARAM_STR);
$stmt->bindValue(2, $_POST["tresc"], PDO::PARAM_STR);
$stmt->bindValue(3, $_SESSION["id"], PDO::PARAM_INT);
$stmt->execute();
echo "Artykul zostal dodany!<br> <a href=\"06.php\">Powrot</a>";
    }
?>
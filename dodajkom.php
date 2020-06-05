<?php

try{
    $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
}
    catch(PDOException $e){
        die("Błąd połączenia " . $e->getMessage());
    }
    session_start();
    $warunek = true;

    if($_SESSION["loggedin"] == false)
    {
        echo "nie jestes zalogowany!<br> <a href=\"02.php\">Powrot</a><br> <a href=\"04.html\">Zaloguj sie</a>";
        $warunek = false;
    }

    if(strlen($_POST["kom"]) > 200  ){
        echo "Komentarz jest za dlugi (powyzej 200 znakow).<br> <a href=\"02.php\">Powrot</a>";
        $warunek = false;
    }
    if(strlen($_POST["kom"]) == 0  ){
        echo "Komentarz jest pusty.<br> <a href=\"02.php\">Powrot</a>";
        $warunek = false;
    }
    if($warunek){
$stmt=$conn->prepare("INSERT INTO komentarze (kom, userid, artykul_id) VALUES (?, ?, ?)");
$stmt->bindValue(1, $_POST["kom"], PDO::PARAM_STR);
$stmt->bindValue(2, $_SESSION["id"], PDO::PARAM_INT);
$stmt->bindValue(3, $_POST['artykul'], PDO::PARAM_INT);
$stmt->execute();
echo "Komentarz zostal dodany!<br> <a href=\"02.php\">Powrot</a>";
    }
?>
<?php

try{
    $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
}
    catch(PDOException $e){
        die("Błąd połączenia " . $e->getMessage());
    }
    
    session_start();  
$stmt=$conn->prepare("INSERT INTO artykul (tytul, tresc, user_id) VALUES (?, ?, ?)");
$stmt->bindValue(1, $_POST["tytul"], PDO::PARAM_STR);
$stmt->bindValue(2, $_POST["tresc"], PDO::PARAM_STR);
$stmt->bindValue(3, $_SESSION["id"], PDO::PARAM_INT);
$stmt->execute();
echo "Artykul został dodany!<br> <a href=\"06.html\">Powrot</a>";
?>
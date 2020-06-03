<?php

try{
    $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
}
    catch(PDOException $e){
        die("Błąd połączenia " . $e->getMessage());
    }
    

$warunek = true;

if($_POST["username"] == NULL or $_POST["email"] == null or $_POST["password"] == null)
{
    echo  "Nie wypełniono wszystkich pól <br> <a href=\"05.html\">Powrót</a>";
    $warunek = false;

}
else if($_POST["password"] != $_POST["password2"] and $warunek ){ 
    echo  "Hasła są różne <br> <a href=\"05.html\">Powrót</a>";
    $warunek = false;
 }
$sql1 = "SELECT nazwa_uzytkownika FROM uzytkownicy WHERE nazwa_uzytkownika = :username";
 if($stmt = $conn->prepare($sql1) and $warunek){
    $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
    $param_username = trim($_POST["username"]);
    if($stmt->execute()){
        if($stmt->rowCount() == 1){
        echo  "Nazwa użytkownia jest zajęta <br> <a href=\"05.html\">Powrót</a>";
    $warunek = false;
    }
}
}
$sql2 = "SELECT email FROM uzytkownicy WHERE email = :email";
if($stmt2 = $conn->prepare($sql2) and $warunek){
    $stmt2->bindParam(":email", $param_email, PDO::PARAM_STR);
    $param_email = trim($_POST["email"]);
    if($stmt2->execute()){
        if($stmt2->rowCount() == 1){
    echo  "Email jest zajęty <br> <a href=\"05.html\">Powrót</a>";
    $warunek = false;
    }
}
}
 if( $warunek){
$stmt3=$conn->prepare("INSERT INTO uzytkownicy (nazwa_uzytkownika, email, haslo_hash) VALUES (?, ?, ?)");
$stmt3->bindValue(1, $_POST["username"], PDO::PARAM_STR);
$stmt3->bindValue(2, $_POST["email"], PDO::PARAM_STR);
$stmt3->bindValue(3, $_POST["password"], PDO::PARAM_STR);
$stmt3->execute();
echo "Konto zostało utworzone!<br> <a href=\"04.html\">Zaloguj się</a>";


}
?>
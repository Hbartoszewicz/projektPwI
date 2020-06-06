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
    echo  "Nie wypelniono wszystkich pol <br> <a href=\"05.html\">Powrot</a>";
    $warunek = false;

}
else if($_POST["password"] != $_POST["password2"] and $warunek ){ 
    echo  "Hasla sa rozne <br> <a href=\"05.html\">Powrot</a>";
    $warunek = false;
 }

if(strlen($_POST["password"]) < 8 and $warunek ){
    echo "Haslo jest za krotkie <br> <a href=\"05.html\">Powrot</a>";
    $warunek = false;
}

$sql1 = "SELECT nazwa_uzytkownika FROM uzytkownicy WHERE nazwa_uzytkownika = :username";
 if($stmt = $conn->prepare($sql1) and $warunek){
    $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
    $param_username = trim($_POST["username"]);
    if($stmt->execute()){
        if($stmt->rowCount() == 1){
        echo  "Nazwa uzytkownia jest zajeta <br> <a href=\"05.html\">Powrot</a>";
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
    echo  "Email jest zajety <br> <a href=\"05.html\">Powrot</a>";
    $warunek = false;
    }
}
}
 if( $warunek){
$stmt3=$conn->prepare("INSERT INTO uzytkownicy (nazwa_uzytkownika, email, haslo_hash) VALUES (?, ?, ?)");
$stmt3->bindValue(1, $_POST["username"], PDO::PARAM_STR);
$stmt3->bindValue(2, $_POST["email"], PDO::PARAM_STR);
$haslo_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$stmt3->bindValue(3,$haslo_hash, PDO::PARAM_STR);
$stmt3->execute();
echo "Konto zostalo utworzone!<br> <a href=\"04.php\">Zaloguj sie</a>";


}
?>

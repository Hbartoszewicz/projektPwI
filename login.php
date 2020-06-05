<?php
try{
    $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
}
catch(PDOException $e){
    die("Błąd połączenia " . $e->getMessage());
}

session_start();


$username = $password = "";

if($_POST["username"] == NULL  | $_POST["password"] == null){
    echo  "Nie wypelniono wszystkich pol <br> <a href=\"04.php\">Powrot</a>";

}
else{
$sql = "SELECT id, nazwa_uzytkownika, haslo_hash from uzytkownicy where nazwa_uzytkownika = :username";
if($stmt = $conn->prepare($sql)){
$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
$param_username = trim($_POST["username"]);
if($stmt->execute()){
    if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()){
            $id = $row["id"];
            $username = $row["nazwa_uzytkownika"];
            $hashed_password = $row["haslo_hash"];
            if($_POST["password"] == $hashed_password){
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;                            
                
                header("location: Panel.php");
                }
                else{
                    echo  "Zle hasło <br> <a href=\"04.php\">Powrot</a>";
                }
            }
            else{
                echo  "Nie ma takiego uzytkownika <br> <a href=\"04.php\">Powrot</a>";
            }
        }if($stmt->rowCount() == 0){
             echo  "Nie ma takiego uzytkownika <br> <a href=\"04.php\">Powrot</a>";
        }
    }
    }
}

?>
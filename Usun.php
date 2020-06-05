  <?php

    try{
    $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
    }
    catch(PDOException $e){
        die("Błąd połączenia " . $e->getMessage());
    }
        $conn -> exec("SET FOREIGN_KEY_CHECKS=OFF");
        $stmt = 'DELETE FROM artykul WHERE id = :id';
        $stmt = $conn->prepare($stmt);
        $stmt->bindValue(':id', $_POST["artykul"], PDO::PARAM_INT);
        $stmt->execute();
        $conn -> exec("SET FOREIGN_KEY_CHECKS=ON");

        echo "Usunieto <br> <a href=\"07.php\">Powrot</a>"
        ?>
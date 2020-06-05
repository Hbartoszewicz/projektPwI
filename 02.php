<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
    <script src="zegar.js"></script>
    <script  src="kalendarz.js"></script>

  </head>
  <body onload="odliczanie(); dzien()">
    <header>
        <h1>Blog o zwięrzetach</h1>
    </header>
    <nav class="container"> 
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="02.php">Artykuły</a></li>
            <li><a href="03.html">O Stronie</a></li>
            <li><a href="04.php">Logowanie</a></li>
            </ul>
    </nav>
    <section>
    <article>
        <h2>Artykuły: </h2>
        <form action="dodajkom.php" method="POST">
              <?php
          $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
          $stmt1 = "SELECT id , tytul,tresc FROM  artykul";    
          $stmt2 = "SELECT a.id as id, a.tytul,a.tresc, k.kom FROM komentarze k join artykul  a on (a.id = k.artykul_id) ";     
          foreach ($conn->query($stmt1) as $row) {
            print
             $row['tytul'] . "<br>"
             .$row['tresc'] . "<br><br>"
             ."Komentarze: "."<br><br>";
             foreach ($conn->query($stmt2) as $row2) {
               if($row2['id'] == $row['id']){               
               print   
               $row2['kom'] . "<br><br>";
               }
             }
             print "<br>";
          }
              ?>
          </form>

    </article>
    <aside>
    <form action="dodajkom.php"  method="POST">
      <textarea id='kom' name='kom' rows="4" cols="50"></textarea><br>
      <p>Wybór artykułu</p>
    <select name="artykul" id="atykul"><br>
        <?php
          $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
          $stmt = "SELECT id , tytul,tresc FROM  artykul";    
        foreach ($conn->query($stmt) as $row) {
            print
            "<option value = '$row[id]' >"
             .$row['tytul']           
             ."</option>";
        }  
        ?>
         </select>
    <button type="submit">Dodaj komentarz</button>
      </form>
    </aside>
  </section>
    <footer id="stopka">
        <p>Autor: Hubert Bartoszewicz</p>
   </footer>
</body>
</html>
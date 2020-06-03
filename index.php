<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
    <script  src="zegar.js"></script>
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
        <h2>Najnowszy artykuł</h2>
        <form  method="POST">
          <?php
      $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
      $stmt = "SELECT tytul, tresc FROM artykul";  
          foreach ($conn->query($stmt) as $row) {
              print
               $row['tytul'] . "<br>"
               .$row['tresc'] . "<br><br>";
          break;
          }
          ?>
        </div>
    </article>
    <aside>
      <p>Aktualna godzina </p><div id="zegar"></div>  
      <p> Aktualna data </p> <div id="dzien"></div>
     
    </aside>
  </section>
    <footer id="stopka">
        <p>Autor: Hubert Bartoszewicz</p>
   </footer>
</body>
</html>
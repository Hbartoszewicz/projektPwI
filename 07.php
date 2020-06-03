<!DOCTYPE html>
<html lang="pl-PL">
  <head >
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
        <h3>Usuń artykuł</h3>
        <form action="Usun.php"  method="POST">
          <select name="artykul" id="artykul">
              <?php
      $conn = new PDO('mysql:host=userdb1;dbname=1197303_QeK','1197303_QeK', 'OERRbPcBG2qtTr');
      session_start();

      $stmt = "SELECT id, tytul, user_id FROM artykul where user_id = :userid";
      $stmt = $conn->prepare($stmt);
      $stmt->bindParam(":userid", $_SESSION['id'], PDO::PARAM_INT);
      $stmt ->execute();
          foreach ($stmt as $row) {
             print
             "<option value = '$row[id]' >"
              .$row['tytul']."</option>";
         }       
        
                  
              ?>
              </select>
              <button type="submit">Usuń</button>
            </form>

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
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
    <script  src="zegar.js"></script>
    <script  src="kalendarz.js"></script>
    <?php
    session_start();
 if($_SESSION["loggedin"] == false){
     header("location:04.php");
 }
 ?>

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
        <h3>Dodaj artykuł</h3>
        <form action="dodaj.php" method="POST">
        <label for="tytul">Tytuł:</label>
        <input type="text" id="tytul" name="tytul">
        <p>
          <textarea  id="tresc" name="tresc" rows="4" cols="50"></textarea>
        </p>
        <button>Dodaj</button>
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
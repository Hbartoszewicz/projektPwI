<!DOCTYPE html>
<html lang="pl-PL">
  <head >
    <meta charset="utf-8">
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
        <h2>Panel użytkownika</h2>
        <div class="panel_uzytkownika">
        <a href="06.html">Dodawanie artykułów</a>
        <a href="07.php">Usuwanie artykułów</a>
      
        </div>
    </article>
    <aside>
        <p>Aktualna godzina </p><div id="zegar"></div>  
        <p> Aktualna data </p> <div id="dzien"></div>
        <br><br>
        <form action="wyloguj.php"  method="POST">
              <button type="submit">Wyloguj</button>
        </from>
    </aside>
  </section>
    <footer id="stopka">
        <p>Autor: Hubert Bartoszewicz</p>
   </footer>
</body>
</html>
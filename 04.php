<!DOCTYPE html>
<html lang="pl-PL">
  <head >
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
    <?php
       session_start();
    if($_SESSION["loggedin"] == true){
        header("location: Panel.php");
    }
    ?>
  </head>
  <body>
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
        <h2>Zaloguj się</h2>
        <div id="panel">
            <form action="login.php" method="POST">
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" id="username" name="username">

                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password">

                <div id="lower">
                    <input id="ckb" type="checkbox"><label class="check" for="ckb">Zapamiętaj mnie!</label>
                    <input id="submit1" type="submit" value="Zaloguj">
                </div>

                <p><a href="05.html">Nie masz konta? Zarejestruj się</a></p>

            </form>
        </div>
    </article>
    <aside>
        <p>Pamietaj aby nikomu nie podawać swoich danych logowania</p>
    </aside>
  </section>
    <footer id="stopka">
        <p>Autor: Hubert Bartoszewicz</p>
   </footer>
</body>
</html>
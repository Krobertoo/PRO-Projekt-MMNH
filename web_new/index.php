<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="icon" href="logo3.png">
    <title>Knižník</title>
</head>

<body>

    <div class="topnav">
        <a class="logo" href="index.php"><img src="logo3.png"></a>
        <a class="active" href="index.php">Knižník</a>

        <?php
        session_start();
         if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo '<a class="logo" href="profil.php?user=' . $username . '"> <img src="Fotky/default.png" alt="Fotka uživatele"></a>';
            echo '<a class="tym" href="logout.php">Odhlásit</a>';
        } else {
            echo '<a class="login" href="login.php">Přihlášení</a>';
            echo '<a class="register" href="register.php">Registrace</a>';
        }
        ?>
        <a class="tym" href="tym.php">Tým</a>
        <a class="autori" href="autori.php">Autoři</a>
        <a class="knizky" href="knizky.php">Knížky</a> 
       

       
    </div>

    <div class="nadpis">Knižní databáze</div>

    <div class="title_pics">
        <a href="http://kniznik.infinityfreeapp.com/knizka.php?id=22"><img class="o1" src="https://www.knihydaniela.cz/vimage/1000x1000/data/image/zbozi/e-kniha-krysar-1.jpg"></a>
        <a href="http://kniznik.infinityfreeapp.com/knizka.php?id=37"> <img class="o2" src="https://cdn.discordapp.com/attachments/756528412801237143/1170055521177452634/r-u-r-9788073900625.jpg?ex=6557a61e&is=6545311e&hm=a4559d6004753ab094435913fb89985fe335dd01aafc592ddb94572db185dbfd&"></a>
    </div>

    <div class="welcome">Vítejte v naší rozsáhlé knižní databázi, kde dobrodružství začíná na každé stránce. Objevte nekonečný svět literatury a ponořte se do fascinujících příběhů, které rozšíří vaše hranice myšlení a přenesou vás do jiných dimenzí. V naší knižní databázi neexistuje omezení, jen vaše vlastní zvědavost a touha objevovat. Bez ohledu na to, zda jste vášnivým čtenářem, studentem hledajícím informace nebo jen dobrodruhem hledajícím nové inspirace, zde máte možnost najít to, co hledáte.</div>

</body>

</html>

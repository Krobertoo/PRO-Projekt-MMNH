<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">

<title>Tým</title>





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
        <a class = "tym" href="tym.php">Tým</a>

        <a class = "autori" href="autori.php">Autoři</a>

        <a class = "knizky" href="knizky.php">Knížky</a>

</div>

<div>

        <div class="nadpis">Náš tým</div>

        <div class="team-members">

        <div class="member">

                <img src="standa3.jpg">

                <h2>Stanislav Hrdý</h2>

                <p>Pozice: Vedoucí databáze knih</p>

                <p>Info: Databázový specialista, Katalogizační odborník.</p>

        </div>

        <div class="member">

                <img src="dominik.jpg">

                <h2>Dominik Matura</h2>

                <p>Pozice: Návrhář</p>

                <p>Info: Kreativní vizionář, UI/UX expert, Inovace v designu</p>

        </div>

        <div class="member">

                <img src="jan.jpg">

                <h2>Jan Bohuněk</h2>

                <p>Pozice: Redaktor</p>

                <p>Info: Revize knih</p>

         </div>   

         <div class="member">

                <img src="Artur2.jpg">

                <h2>Mikoláš Artur Nedvídek</h2>

                <p>Pozice: Programátor</p>

                <p>Info: Webové programování</p>

        </div>   

        <div class="member">

                <img src="dan2.jpg">

                <h2>Daniel Maňásek</h2>

                <p>Pozice: Manager</p>

                <p>Info: Organizace práce, Stanovování úkolů, jejich kontrolu a případnou pomoc</p>

        </div>   

        <div class="member">

                <img src="mark.jpg">

                <h2>Volné místo</h2>

                <p>Pozice: Rencenzent</p>

                <p>Nabíráme na tuto pozici</p>

        </div>  

                

                </div>

        </div>

    </div>

</body>

</html>
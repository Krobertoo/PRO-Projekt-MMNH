<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="styl.css">

<link rel="icon" href="logo3.png">

<title>Knihy</title>





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




<div class="nadpis">Knihy</div>

<div class="search">

<form accept-charset="utf-8" method="GET" action="search.php">

        <label for="search">Vyhledej:</label>

        <input type="text" name="search" id="search">

        <input type="submit" value="Search">
        <button type="button" onclick="window.history.back();">Zpět</button>

      

    </form> 

    </div> 

<div class="sql">

<p>Výsledky vyhledávání:</p>

<?php

    $servername = "sql303.infinityfree.com";

    $username = "if0_35293337";

    $password = "2LnlAsGcqtHwV";

    $dbname = "if0_35293337_kniznik";



    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->set_charset("utf8mb4") === false) {

        die("Nepodařilo se nastavit kódování: " . $conn->error);

    }





    if (isset($_GET['search'])) {

        $search = $_GET['search'];

        $sql = "SELECT * FROM knihy WHERE nazev LIKE '%$search%'";

        $result = $conn->query($sql);





        if ($result->num_rows > 0) {

            echo "<ul>";

            while ($row = $result->fetch_assoc()) {



                echo "<li><a href='knizka.php?id=" . $row['knihy_id'] . "'>" . $row['nazev'] ."</a></li>";

            }

             echo "</ul>";

        } else {

            echo "Nebylo nic nalezeno.";

        }



}



$conn->close();

?>

</div>

</body>

</html>


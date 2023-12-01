<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="styl.css">

<link rel="icon" href="logo3.png">

<title>Knihy</title>





</head>

<body>

<div class="topnav">

        <a class="logo" href="index.html"><img src="logo3.png"></a>

        <a class="active" href="index.html">Knižník</a>

        <a class = "tym" href="tym.html">Tým</a>

        <a class = "autori" href="autori.php">Autoři</a>

        <a class = "knizky" href="knizky.php">Knížky</a>

</div>



<div>

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


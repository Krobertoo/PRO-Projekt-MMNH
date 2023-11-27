<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">

<title>Knížka</title>





</head>

<body>

<div class="topnav">

        <img src="logo3.png">

        <a class="active" href="index.html">Knižník</a>

        <a class = "tym" href="tym.html">Tým</a>

        <a class = "autori" href="autori.php">Autoři</a>

        <a class = "knizky" href="knizky.php">Knížky</a>

</div>
<div class="nadpis">Knižní databáze</div>
<div class="text_kniha">

<?php
    $servername = "sql303.infinityfree.com";
    $username = "if0_35293337";
    $password = "2LnlAsGcqtHwV";
    $dbname = "if0_35293337_kniznik";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $itemId = $_GET['id'];

    // Assuming you have a database connection established

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->set_charset("utf8mb4") === false) {

        die("Nepodařilo se nastavit kódování: " . $conn->error);

    }

    // Fetch item details based on the ID
    $sql = "SELECT * FROM autor WHERE autor_id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>Jméno:</strong> {$row['jmeno']}</p>";
        echo "<p><strong>Narození:</strong> {$row['narozeni']}</p>";
    } else {
        echo "Item not found.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
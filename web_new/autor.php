<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">

<title>Autor</title>





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
<div class="nadpis">Autor</div>
<div class="autor">

<?php
    $servername = "sql303.infinityfree.com";
    $username = "if0_35293337";
    $password = "2LnlAsGcqtHwV";
    $dbname = "if0_35293337_kniznik";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $itemId = $_GET['id'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->set_charset("utf8mb4") === false) {

        die("Nepodařilo se nastavit kódování: " . $conn->error);

    }


if ($itemId) {
    $photo_path = "Fotky/{$itemId}.jpg"; 

    
    if (file_exists($photo_path)) {
       
        echo "<img src='{$photo_path}' alt='Fotka autora'>";

   }
 
$sql = "SELECT * FROM autor WHERE autor_id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>Jméno:</strong> {$row['jmeno']}</p>";
        echo "<p><strong>Narození:</strong> {$row['narozeni']}</p>";
        echo "<p><strong>Životopis:</strong> {$row['text']}</p>";
    } else {
        echo "Autor nenalezen.";
    }
 }
    $conn->close();
    ?>
</div>

</body>
</html>

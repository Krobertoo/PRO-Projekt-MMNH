<?php
 $servername = "sql303.infinityfree.com";

$username = "if0_35293337";

$password = "2LnlAsGcqtHwV";

$dbname = "if0_35293337_kniznik";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 if ($conn->set_charset("utf8mb4") === false) {

        die("Nepodařilo se nastavit kódování: " . $conn->error);

    }
$successMessage = "";
$errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
     $password = $_POST["password"];

    if (strlen($username) < 2) {
        $errorMessage = "Jméno musí mít 3 a více znaků.";
    } elseif (strlen($password) < 7) {
        $errorMessage = "Heslo musí mít minimálně 8 znaků.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO uzivatel (jmeno, heslo) VALUES ('$username', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Registrace úspěšná!";
        header("refresh:2;url=login.php");
    } else {
        $successMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
$conn->close();
?>


<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">
<title>Registrace</title>





</head>

<body>

<div class="topnav">

<a class="logo" href="index.php"><img src="logo3.png"></a>

        <a class="active" href="index.php">Knižník</a>

        <a class = "tym" href="tym.php">Tým</a>

        <a class = "autori" href="autori.php">Autoři</a>

        <a class = "knizky" href="knizky.php">Knížky</a>

</div>

<div class="nadpis">Registrace</div>

  <div class="register_panel">
      <form method="post" action="">
        <label for="username">Uživatelské jméno:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Heslo:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Zaregistrovat</button>
    
    </form>
    <div class="messages">
    <?php
      if ($errorMessage !== "") {
        echo '<p>' . $errorMessage . '</p>';
      } elseif ($successMessage !== "") {
        echo '<p>' . $successMessage . '</p>';
        
      }
      ?>
    </div>

    <div class="register_link">
      <a href="login.php">Již máte účet?</a>
    </div>
  </div>

    
  </div>

</body>
</html>

</body>

</html>
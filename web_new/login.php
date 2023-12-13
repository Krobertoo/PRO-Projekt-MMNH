<?php
session_start();

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

$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM uzivatel WHERE jmeno='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["heslo"];

        if (password_verify($password, $hashedPassword)) {

            $_SESSION["username"] = $username;


            header("Location: index.php");
            exit();
        } else {
            $loginMessage = "Nesprávné heslo!";
        }
    } else {
        $loginMessage = "Uživatel nenalezen.";
    }
}

$conn->close();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="icon" href="logo3.png">
    <title>Přihlášení</title>
</head>

<body>
    <div class="topnav">
        <a class="logo" href="index.php"><img src="logo3.png"></a>
        <a class="active" href="index.php">Knižník</a>
         <?php
        session_start();
         if (isset($_SESSION["username"])) {
            echo '<a class="logo"> <img src="Fotky/default.png" alt="Fotka uživatele"></a>';
            echo '<a class="tym" href="logout.php">Odhlásit</a>';
        }
        ?>
        <a class="tym" href="tym.php">Tým</a>
        <a class="autori" href="autori.php">Autoři</a>
        <a class="knizky" href="knizky.php">Knížky</a>
    </div>

    <div class="nadpis">Přihlášení</div>

    <div class="login_panel">
        <form method="post" action="">
            <label for="username">Uživatelské jméno:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Heslo:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Přihlásit</button>
            <a href="register.php"></a>
        </form>
        <div class="messages">
            <?php
            if ($loginMessage !== "") {
                echo '<p>' .  $loginMessage . '</p>';
            }
            ?>
        </div>
        <div class="register_link">
            <a href="register.php">Nemáte účet ?</a>
        </div>
    </div>
</body>
</html>

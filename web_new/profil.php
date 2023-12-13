<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="icon" href="logo3.png">
    <title>Profil</title>
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
<div class="nadpis">Profil</div>
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

if (isset($_GET['user'])) {
    $username = $_GET['user'];

    $sql = "SELECT * FROM uzivatel WHERE jmeno='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="text_kniha">';
        echo '<p>Uživatelské jméno: ' . $row['jmeno'] . '</p>';
        echo '<form method="post" action="delete_account.php">';
        echo '<input type="hidden" name="username" value="' . $row['jmeno'] . '">';
        echo '<button type="submit">Smazat účet</button>';
        echo '</form>';

        if ($row['uziv_id'] == 1 || $row['uziv_id'] == 2) {
            echo '<form method="post" action="">';
            echo '<label for="bookName">Zadejte název knihy k odstranění:</label>';
            echo '<input type="text" id="bookname" name="bookName" required>';
            echo '<button type="submit">Odstranit knihu</button>';
            echo '</form>';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookName'])) {
                $bookName = $_POST['bookName'];

                $sql_delete_book = "DELETE FROM knihy WHERE nazev='$bookName'";
                $result_delete_book = $conn->query($sql_delete_book);
                if ($result_delete_book) {
                    if ($conn->affected_rows > 0) {
                        echo '<p>Kniha byla úspěšně odstraněna.</p>';
                    } else {
                        echo '<p>Kniha s názvem "' . $bookName . '" nebyla nalezena v databázi.</p>';
                    }
                } else {
                    echo '<p>Chyba při odstraňování knihy: ' . $conn->error . '</p>';
                }
            }
        }

        


      $sql_favorite_books = "SELECT knihy.nazev FROM favorite_books
            JOIN knihy ON favorite_books.book_id = knihy.knihy_id
            WHERE favorite_books.user_id = " . $row['uziv_id'];

$result_favorite_books = $conn->query($sql_favorite_books);

if ($result_favorite_books) {
    if ($result_favorite_books->num_rows > 0) {
        echo '<p>Seznam oblíbených knih:</p>';
        echo '<ul>';
        while ($favorite_book = $result_favorite_books->fetch_assoc()) {
            echo '<li>' . $favorite_book['nazev'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Nemáte žádné oblíbené knihy.</p>';
    }
} else {
    echo '<p>Chyba při získávání oblíbených knih: ' . $conn->error . '</p>';
}

    } else {
        echo 'Uživatel nenalezen.';
    }
}
echo '</div>';
$conn->close();
?>
</body>
</html>
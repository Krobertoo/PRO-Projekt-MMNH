<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">

<title>Knížka</title>





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
<div class="nadpis">Kniha</div>
<div class="text_kniha">

 <?php
  session_start();
        $servername = "sql303.infinityfree.com";
        $username = "if0_35293337";
        $password = "2LnlAsGcqtHwV";
        $dbname = "if0_35293337_kniznik";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $itemId = $_GET['id'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($conn->set_charset("utf8mb4") === false) {
            die("Nepodařilo se nastavit kódování: " . $conn->error);
        }

        $sql = "SELECT knihy.*, autor.jmeno as jmeno
            FROM knihy
            JOIN autor ON knihy.autor_id = autor.autor_id
            WHERE knihy.knihy_id = $itemId";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Název:</strong> {$row['nazev']}</p>";
            echo "<p><strong>Autor: </strong><a href='http://kniznik.infinityfreeapp.com/autor.php?id=" . $row["autor_id"] . "'>{$row['jmeno']}</a></p>";
            echo "<p><strong>Vydání:</strong> {$row['vydani']}</p>";
            echo "<p><strong>Počet stran:</strong> {$row['pocet_stran']}</p>";
            echo "<p><strong>Žánr:</strong> {$row['zanr']}</p>";


           $username = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
    

    $getUserIdSql = "SELECT * FROM uzivatel WHERE jmeno = '$username'";
    $resultUserId = $conn->query($getUserIdSql);

    if ($resultUserId->num_rows > 0) {
        $Urow = $resultUserId->fetch_assoc();
        $userId = $Urow['uziv_id'];
    }
            $bookId = $row['knihy_id'];

            $isInFavorites = false;

            if ($userId) {
                $checkFavoritesSql = "SELECT * FROM favorite_books WHERE user_id = $userId AND book_id = $bookId";
                $checkResult = $conn->query($checkFavoritesSql);

                if ($checkResult->num_rows > 0) {
                    $isInFavorites = true;
                }
            }

            if ($userId) {
                echo '<form method="post" action="';
                echo $isInFavorites ? 'remove.php' : 'add_to_favorites.php';
                echo '">';
                echo '<input type="hidden" name="user_id" value="' . $userId . '">';
                echo '<input type="hidden" name="book_id" value="' . $bookId . '">';
                echo '<button type="submit">';
                echo $isInFavorites ? 'Odebrat z oblíbených' : 'Přidat do oblíbených';
                echo '</button>';
                echo '</form>';
            }
        } else {
            echo "Item not found.";
        }

        $conn->close();
        ?>
</div>
</body>
</html>
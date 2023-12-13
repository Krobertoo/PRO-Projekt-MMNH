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

if (isset($_SESSION['username']) && isset($_POST['book_id'])) {
    $username = $_SESSION['username'];
    $book_id = $_POST['book_id'];

    $check_sql = "SELECT * FROM favorite_books WHERE user_id = (SELECT uziv_id FROM uzivatel WHERE jmeno = '$username') AND book_id = $book_id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows === 0) {
        $add_sql = "INSERT INTO favorite_books (user_id, book_id) VALUES ((SELECT uziv_id FROM uzivatel WHERE jmeno = '$username'), $book_id)";
        $add_result = $conn->query($add_sql);

        if ($add_result) {
            echo "Kniha byla přidána do oblíbených.";
        } else {
            echo "Chyba při přidávání do oblíbených: " . $conn->error;
        }
    } else {
        echo "Kniha již byla přidána do oblíbených.";
    }
} else {
    echo "Nepovolený přístup.";
}
header("Location: {$_SERVER['HTTP_REFERER']}");
$conn->close();
?>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["user_id"];
    $bookId = $_POST["book_id"];


    $removeFavoritesSql = "DELETE FROM favorite_books WHERE user_id = $userId AND book_id = $bookId";

    if ($conn->query($removeFavoritesSql) === TRUE) {
        echo "Book removed from favorites successfully.";
    } else {
        echo "Error removing book from favorites: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
 header("Location: {$_SERVER['HTTP_REFERER']}");
$conn->close();
?>

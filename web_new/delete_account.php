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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $username = $_POST['username'];


    $sql_delete = "DELETE FROM uzivatel WHERE jmeno='$username'";
    $result_delete = $conn->query($sql_delete);

    if ($result_delete) {
  
        session_unset();
        session_destroy();

        header("Location: index.php");
        exit();
    } else {
        echo 'Chyba při mazání účtu: ' . $conn->error;
    }
}

$conn->close();
?>

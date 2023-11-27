<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styl.css">
<link rel="icon" href="logo3.png">
<title>Autoři</title>


</head>
<body>
<div class="topnav">
        <img src="logo3.png">
        <a class="active" href="index.html">Knižník</a>
        <a class = "tym" href="tym.html">Tým</a>
        <a class = "autori" href="autori.php">Autoři</a>
        <a class = "knizky" href="knizky.php">Knížky</a>
</div>
<div class="nadpis">Autoři</div>
<div class="abeceda">
 <?php
            echo "<a href='autori.php'>Vše</a>";
            echo " ";
            foreach (range('A', 'Z') as $letter) {
                echo "<a href='autori.php?letter=$letter'>$letter</a>";
                echo " ";
            
            }
            
        ?>
</div>
<div class="sql">
<?php
 
   
    $servername = "sql303.infinityfree.com";
    $username = "if0_35293337";
    $password = "2LnlAsGcqtHwV";
    $dbname = "if0_35293337_kniznik";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        echo "Spojení se nezdařilo";
    }
    $conn->set_charset("utf8mb4");
    if (isset($_GET['letter'])) {
        $selectedLetter = $_GET['letter'];
    
        $sql = "SELECT * FROM autor WHERE jmeno LIKE '$selectedLetter%'";
            $result = $conn->query($sql);  
            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $id = $row["autor_id"]; 
                    echo "<li><a href='autor.php?id=$id'>" . $row["jmeno"] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "Žádný autor začínající na $selectedLetter.";
            }

    } 
    else {
        $sql = "SELECT * FROM autor ORDER BY jmeno ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $id = $row["autor_id"]; 
                    echo "<li><a href='autor.php?id=$id'>" . $row["jmeno"] . "</a></li>";
                }
                echo "</ul>";
            }
    }
          
$conn->close();

?>
</div>





</body>
</html>
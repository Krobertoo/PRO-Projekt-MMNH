<html>
    <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://kappa.lol/QSbKC">
    <title>Knižní databáze</title>
    </head>
    <body>
      <link rel="stylesheet" href="style.css">
    <h1><b>Knižní databáze</b></h1>
    <p>Funkce. Stanislav Hrdý. Přerušení provozování min. jedné z živností. 65019989. Veselí nad Lužnicí - Horusice 43, PSČ 391 81. Podnikatel. -. Stanislav Hrdý.</p>
    </body>
    
    <?php
        $servername = "sql303.infinityfree.com";
        $username = "if0_35293337";
        $password = "2LnlAsGcqtHwV";
        $dbname = "if0_35293337_kniznik";

        // Create connection
        $conn = new mysqli($servername, $username, $password);


        $sql = "INSERT INTO autor (jmeno, prezdivka, narozeni)
        VALUES ('John', 'Franta', 1984-12-07)";

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    ?>

</html>

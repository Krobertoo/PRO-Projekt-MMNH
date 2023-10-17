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
        $servername = "sql203.epizy.com";
        $username = "epiz_33059265";
        $password = "PvHcyla59S0";
        $dbname = "epiz_33059265_12";

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

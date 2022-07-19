<?php

    include './inc/setupDB.php';

    $tname = 'Orders';

    

    // der SQL-Befehl für das Hinzufügen
    $sql = "INSERT INTO $tname(userID, articleID, Quantity) VALUES('','' ,'', '2002-01-01';

    if (!mysqli_query($conn, $sql)) {
        die("Insert fehlgeschlagen: " . mysqli_error());
    } else {
        echo "Das Buch wurde erfolgreich hinzugefügt!";
    }

    $conn -> closs();
?> 
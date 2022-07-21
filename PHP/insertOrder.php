<?php

    include './inc/setupDB.php';
    session_start();
    if(!isset($_SESSION['username'])) {
      echo "Bitte erst einloggen <a href=\"formular.html\">Login</a>"; }
    else {
      $id= $_SESSION["id"];
      echo $id;
    }  
    $tname = "orders";
    $articleID = $_POST['articleID'];
    $quantity = $_POST['Quantity'];
    $date = $_POST['pDate'];
    $sql = "INSERT INTO $tname(UserID, articleID, Quantity,pDate) VALUES('$id','$articleID' ,'$quantity', '$date')";
        
    $db->query($sql) or die('An error occured 1: ' . mysql_error());
    $db->close();
?> 
    


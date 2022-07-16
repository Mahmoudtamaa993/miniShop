<?php

$server = "127.0.0.1";
$username = "root";
$password = "";
$dbName = "miniShop";


// Create a database Connection
$db = mysqli_connect($server,$username,$password,$dbName );
// Check for the connection success 
if (!$db){
    echo 'Error: ' . mysqli_connect_error();
}




mysqli_close($db);

?>
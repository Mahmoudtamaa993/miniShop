<!DOCTYPE html>
<html> 
<head>
	<meta charset="UTF-8" />
	<title>logout</title> 
</head>
<body>  
<?php
    session_start();
    // Löschen Session Daten
    $_SESSION = array();
    // Löschen Session
    
    echo "Logout Success";
    session_destroy();
?>
<br/>
Zurück zu <a href="userLogin.php">Login</a>
</body>
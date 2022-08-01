<?php

// Set Connection variable
$server = "127.0.0.1";
$username = "root";
$password = "";
$dbName = "miniShop";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Create a database Connection
$db = mysqli_connect($server,$username,$password,$dbName );
// Check for the connection success 
if (!$db){
    echo 'Error: ' . mysqli_connect_error();
}else{
    $users = "CREATE TABLE IF NOT EXISTS  Users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        firstname varchar(50),
        lastname varchar(50),
        email varchar(50),
        username varchar(50),
        pswd varchar(50)
    )";
    $articles =  "CREATE TABLE IF NOT EXISTS  Articles (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name varchar(50),
        description varchar(50),
        price double,
        img BLOB,
        Quantity INT
    )";
    $Orders = "CREATE TABLE IF NOT EXISTS Orders(
        UserID INT(11) NOT NULL,
        articleID INT(11) NOT NULL,
        Quantity INT(11) NOT NULL,
        pDate date,
        FOREIGN KEY (UserID) REFERENCES Users(id),
        FOREIGN KEY (articleID) REFERENCES Articles(id)
        )";
        

    mysqli_query($db, $users);
    mysqli_query($db, $articles);
    mysqli_query($db, $Orders);

    function insertUser($firstName,$lastName,$email,$username,$pswd){
        $query = "INSERT INTO Users (firstname, lastname, email, username, pswd)
        VAlUES ('$firstName', '$lastName', '$email','$username', '$pswd')";
        mysqli_query($GLOBALS['db'], $query);
    }

    $fetchRow = $db -> query("SELECT * FROM users");
    if (mysqli_num_rows($fetchRow) == 0) {
        insertUser ("Mahmoud", "Tamaa", "mta@uni-bremen.de","Mahmoud", "12345Aa");
        insertUser("Anna", "Angold", "aag@uni-bremen.de","Anna", "12345Aa");
        insertUser("Admin", "Admin", "admin@uni-bremen.de","admin", "12345Aa");
    }

    function insertArticle($name, $description, $price, $filePath, $Quantity){
        $blob = file_get_contents($filePath);
        $query = "INSERT INTO Articles (name, description, price, img, Quantity)
        VAlUES ('$name', '$description', '$price', 0x".bin2hex($blob).", '$Quantity')";
        mysqli_query($GLOBALS['db'], $query);   
    }

    $fetchRow = $db -> query("SELECT * FROM articles");
    if (mysqli_num_rows($fetchRow) == 0) {
        insertArticle("pflanzee1", "schön", "19.99", "../../p1.png", "33");
        insertArticle("pflanzee2", "schön", "19.99", "../../p2.png", "3");
        insertArticle("pflanzee2", "schön", "19.99", "../../p3.png", "13"); 
    }

    function insertOrder($aUserID, $aArticleID, $aQuantity, $aDate){

        $query = "INSERT INTO orders (UserID, articleID, Quantity, pDate)
                VAlUES ('$aUserID', '$aArticleID', '$aQuantity', '$aDate')";        
        mysqli_query($GLOBALS['db'], $query);
    }
    $fetchRow = $db -> query("SELECT * FROM orders");
    if (mysqli_num_rows($fetchRow) == 0) {             
        insertOrder("1", "1", "54", "2022-02-01");
        insertOrder("2", "2", "24", "2022-02-02");
        insertOrder("1", "2", "54", "2022-02-03");
        insertOrder("2", "1", "14", "2022-02-04");
        insertOrder("1", "1", "2", "2022-02-08");
    }
    
}
?>
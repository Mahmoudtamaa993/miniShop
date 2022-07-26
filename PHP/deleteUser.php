<?php
  include './inc/setupDB.php'; 

  $userID = $_POST['UserID'];

  $sql = "DELETE FROM users WHERE id =  $userID";
      
  $db->query($sql) or die('An error occured 1: ' . mysql_error());
  $db->close();
?>
<?php
  include './inc/setupDB.php'; 

  $articleID = $_POST['articleID'];

  $sql = "DELETE FROM articles WHERE id = $articleID";
      
  $db->query($sql) or die('An error occured 1: ' . mysql_error());
  $db->close();
?>
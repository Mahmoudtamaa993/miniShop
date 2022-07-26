<?php
include './inc/setupDB.php';

$sql = "SELECT id,firstname,lastname,email,username,pswd FROM users";
$result = $db->query($sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
  $rows[] = array('id'=>$row['id'], 'firstName'=>$row['firstname'],'lastName'=>$row['lastname'],'email'=>$row['email'],'userName'=>$row['username'],'password'=>$row['pswd']);
}

$ps = json_encode($rows);
echo ($ps);
?>
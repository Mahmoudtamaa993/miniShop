<?php
include './inc/setupDB.php';

$username ='Mahmoud';
$sql = "SELECT id,name,description,price,img,Quantity FROM articles";
$result = $db->query($sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
  $imageData = base64_encode($row['img']);
  $src = 'data:image/png;base64,' . $imageData;
  $img = '<img src = "' . $src . '" width="150" heigth="150"/>';
  $rows[] = array('id'=>$row['id'], 'name'=>$row['name'],'description'=>$row['description'],'price'=>$row['price'],'img'=>$src,'Quantity'=>$row['Quantity']);
}

$ps = json_encode($rows);
echo ($ps);
?>
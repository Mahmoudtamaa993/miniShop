<?php
include './inc/setupDB.php';

// initializing variables
$Name = '';
$price = 0 ;
$quantity = 0 ;
$descriptionText = '';
$errors = array(); 
$blob = "";


if (isset($_POST['submitUpdate'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['SelectedId']);
    $Name = mysqli_real_escape_string($db, $_POST['SelectedName']);
    $price = mysqli_real_escape_string($db, $_POST['selectedPrice']);
    $quantity = mysqli_real_escape_string($db, $_POST['selectedQuantity']);
    $descriptionText = mysqli_real_escape_string($db, $_POST['selectedDescriptionText']);

    $bildPathActual =mysqli_real_escape_string($db, $_POST['test']);

    $bildPathNew = $_FILES['selectedImage']['tmp_name'];
     
    if (empty($Name)) { array_push($errors, "name is required"); }
    if (empty($price)) { array_push($errors, "price is required"); }
    if (empty($quantity)) { array_push($errors, "quantity is required"); }
    if (empty($descriptionText)) { array_push($errors, "descriptionText is required"); }
    if (empty($id)) { array_push($errors, "id is required"); }
  

    if (count($errors) == 0) {
      if (! empty($bildPathNew)){
        $blob = file_get_contents($bildPathNew);
        $query = "UPDATE Articles SET name='$Name', description='$descriptionText', price='$price', img= 0x".bin2hex($blob).", Quantity='$quantity' WHERE id = $id";     
        mysqli_query($db, $query);
        header('location: http://localhost/miniShop/HTML_CSS_JS/article.php');
      }else {
        $query = "UPDATE Articles SET name='$Name', description='$descriptionText', price='$price', Quantity='$quantity' WHERE id = $id";
        echo $query;      
        mysqli_query($db, $query);
        header('location: http://localhost/miniShop/HTML_CSS_JS/article.php');
      } 

    }else{
      if (count($errors) > 0){
        foreach ($errors as $error){
          echo $error;
        }   
      }
    }    
  }
  mysqli_close($db);

 


?>
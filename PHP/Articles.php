<?php
include './inc/setupDB.php';



// initializing variables
$Name = '';
$price = 0 ;
$quantity = 0 ;
$descriptionText = '';
$errors = array(); 


if (isset($_POST['submit'])) {
    // receive all input values from the form
    $Name = mysqli_real_escape_string($db, $_POST['Name']);
    $price = mysqli_real_escape_string($db, $_POST['Price']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $descriptionText = mysqli_real_escape_string($db, $_POST['descriptionText']);
  
    $bildPath = $_FILES['myImage']['tmp_name'];
    $blob = file_get_contents($bildPath);
    
    // form validation: ensure that the form is correctly filled ...
    
    if (empty($Name)) { array_push($errors, "name is required"); }
    if (empty($price)) { array_push($errors, "price is required"); }
    if (empty($quantity)) { array_push($errors, "quantity is required"); }
    if (empty($descriptionText)) { array_push($errors, "descriptionText is required"); }
  

    $article_check_query = "SELECT * FROM Articles WHERE name='$Name' LIMIT 1";
    $result = mysqli_query($db, $article_check_query);
    $article = mysqli_fetch_assoc($result);
    
    if ($article) { 
      if ($article['name'] === $Name) {
        array_push($errors, "Article already exists");
      }
    }

    if (count($errors) == 0) {
      
        $query = "INSERT INTO Articles (name, description, price, img, Quantity)
                VAlUES ('$Name', '$descriptionText', '$price', 0x".bin2hex($blob).", '$quantity')";
                
        mysqli_query($db, $query);
        header('location: http://localhost/miniShop/HTML_CSS_JS/Article.html');
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

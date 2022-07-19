<?php

$isLoggedIn = false;
$isAdmin = false;

?>

<!DOCTYPE html>
<html>

<head>
  <title>Spielerei mit Tabellen: Zebrastreifen</title>
  <link rel="stylesheet" href="../HTML_CSS_JS/main.css">
</head>

<body>
  <nav class="main-navbar‚">
    <ul>
      <li><a href="../HTML_CSS_JS/About.html"><img src="../HTML_CSS_JS/img/logo.svg" alt="logo of the plantstore" ></a></li>
                <li><a class="navpoints" href="Article.html">Home</a></li>
                <li><a class="navpoints" href="shoppingcart.html">Cart</a></li>
                <?php if (!$isLoggedIn) { ?>
                  <li><a class="navpoints" href="login.html">Login</a></li>
                  <li><a class="navpoints" href="register.html">Register</a></li>
                <?php } elseif($isLoggedIn && $isAdmin)  { ?>
                  <li><a class="navpoints" href="admin_dashboard.html">Admin Dashboard</a></li>
                <?php } ?>
              </ul>
</nav>

  <table id="Article">
    <caption>Article</caption>
    <col width=50>
    <col width=600>
    <col width=200>
    <col width=300>
    <col width=400>
    <thead>
      <tr>
        <th>Name</th>
        <th>description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>image</th>
      </tr>
    </thead>
    <tbody id="articleTableBody">
      <?php
      include './inc/setupDB.php';

      $sql ="SELECT * FROM articles";
      $result = $db -> query($sql);
      $str ='';
      while ($row = $result->fetch_assoc()){
        $imageData = base64_encode($row['img']);
        $src = 'data:image/png;base64,' . $imageData;
        $img = '<img src = "' . $src . '" width="150" heigth="150"/>';
       // $btn ='<button onclick="'addToCart(.$row['id'].)'"/>'
        $str .= '<tr> <td>' .$row['name']. '</td>
                      <td>' .$row['description']. '</td>
                      <td>' .$row['price']. '</td>
                      <td>' .$row['Quantity']. '</td>
                      <td>' . $img . '</td>
                   
                  <tr>';
      }
      echo($str);
      $db->close();
      ?>


    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">
          <a href="../HTML_CSS_JS/shoppingcart.html">Go To Cart</a>
        </td>
      </tr>
    </tfoot>
  </table>
  <script type="text/javascript" src="../HTML_CSS_JS/js/cart.js"></script>


</body>

</html>
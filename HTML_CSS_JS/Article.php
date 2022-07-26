<?php

$isLoggedIn = false;
$isAdmin = false;

session_start();
  if(!isset($_SESSION['username'])) {
    echo "Bitte erst einloggen <a href=\"userLogin.html\">Login</a>"; }
  else {
    $welcome = $_SESSION["username"]; }

if (isset($_SESSION['username'])){
  $username = $_SESSION["username"];}


if (! empty($username)) {
  $isLoggedIn =true;
  if ($username == "admin"){
    $isAdmin =true;
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Articles</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <script type="text/javascript" src="js/articlesSetup.js"></script>
  <script type="text/javascript" src="js/cart.js"></script>
  <nav class="main-navbar">
    <ul>
      <li><a href="../HTML_CSS_JS/About.html"><img src="../HTML_CSS_JS/img/logo.svg" alt="logo of the plantstore" ></a></li>
                <li><a class="navpoints" href="article.php">Home</a></li>
                <?php if ($isLoggedIn) { ?>
                  <li><a class="navpoints" href="shoppingcart.php">Cart</a></li> 
                <?php } else  { ?> 
                  <li><a class="navpoints" href="userLogin.html">Cart</a></li>   
                <?php } ?>
                <?php if (!$isLoggedIn) { ?>
                  <li><a class="navpoints" href="userLogin.html">Login</a></li>
                  <li><a class="navpoints" href="userRegister.html">Register</a></li>
         
                <?php } elseif($isLoggedIn && $isAdmin)  { ?>
                  <li><a class="navpoints" href="import.html">Import Article</a></li>
                  <li><a class="navpoints" href="../php/getAllUserOrders.php">All Cart</a></li>
                  <li><a class="navpoints" href="users.php">Users</a></li>
                  <li><a class="navpoints" href="logOut.php">logOut</a></li>
                  
                <?php }elseif(! $isAdmin && $isLoggedIn)  { ?>
                  <li><a class="navpoints" href="logOut.php">logOut</a></li>
                <?php } ?>
              </ul>
    </nav>
    <p><?php if ($isLoggedIn){ echo 'Welcome' .'   '. $welcome; }?></p>
  
  <table id="article">
    <thead id ="theads">
      <tr>
          <th>Nr</th>
          <th>Name</th>
          <th>Price</th>
          <th>Img </th>
          <th>Quantity </th>
          <th>Add to cart </th>
      </tr>  
    </thead>

    <tbody id="articleTableBody">
    </tbody>

    <tfoot>
      <tr>
        <td colspan="7">
        <?php if ($isLoggedIn) { ?>
          <a href="shoppingcart.php">Go To Cart</a>  
        <?php } else  { ?> 
          <a href="userLogin.html">Go To Cart</a>   
        <?php } ?>
        </td>
      </tr>
    </tfoot>
  </table> 
  <p id="ajaxinfo"></P>
</body>

</html>
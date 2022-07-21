<?php

$isLoggedIn = false;
$isAdmin = false;

session_start();
  if(!isset($_SESSION['username'])) {
    echo "Bitte erst einloggen <a href=\"userLogin.php\">Login</a>"; }
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
  <title>Spielerei mit Tabellen: Zebrastreifen</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <script type="text/javascript" src="js/integration.js"></script>
  <script type="text/javascript" src="js/cart.js"></script>
  <nav class="main-navbar‚">
    <ul>
      <li><a href="../HTML_CSS_JS/About.php"><img src="../HTML_CSS_JS/img/logo.svg" alt="logo of the plantstore" ></a></li>
                <li><a class="navpoints" href="article.php">Home</a></li>
                <?php if ($isLoggedIn) { ?>
                  <li><a class="navpoints" href="shoppingcart.php">Cart</a></li> 
                <?php } else  { ?> 
                  <li><a class="navpoints" href="userLogin.php">Cart</a></li>   
                <?php } ?>
                <?php if (!$isLoggedIn) { ?>
                  <li><a class="navpoints" href="userLogin.php">Login</a></li>
                  <li><a class="navpoints" href="userRegister.php">Register</a></li>
                  <li><a class="navpoints" href="logOut.php">logOut</a></li>
                <?php } elseif($isLoggedIn && $isAdmin)  { ?>
                  <li><a class="navpoints" href="import.php">Import Article</a></li>
                  <li><a class="navpoints" href="../php/getAllUserOrders.php">All Cart</a></li>
                  <li><a class="navpoints" href="users.php">Users</a></li>
                  
                <?php }elseif(! $isAdmin && $isLoggedIn)  { ?>
                  <li><a class="navpoints" href="logOut.php">logOut</a></li>
                <?php } ?>
              </ul>
    </nav>
    <p><?php if ($isLoggedIn){ echo 'Welcome' .'   '. $welcome; }?></p>
  
  <table id="article">
    <thead id ="thead">
    </thead>
    <tbody id="articleTableBody">
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7">
        <?php if ($isLoggedIn) { ?>
          <a href="shoppingcart.php">Go To Cart</a>  
        <?php } else  { ?> 
          <a href="userLogin.php">Go To Cart</a>   
        <?php } ?>
        </td>
      </tr>
    </tfoot>
  </table>
 
</body>

</html>
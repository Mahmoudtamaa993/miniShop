
<!DOCTYPE html>
<html>

<head>
  <title>Spielerei mit Tabellen: Zebrastreifen</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>

  <p id="test12"></p>

</script>
  <header class="navbar">
    <nav class="main-navbar">
      <ul>
        <li><a href="About.html"><img src="./img/logo.svg" alt="logo of the plantstore" ></a></li>
        <li><a class="navpoints" href="article.php">Home</a></li>
        <li><a class="navpoints" href="shoppingcart.html">Dein Warenkorb</a></li>
      </ul>
  </nav>

  <h2 style="text-align:center">Article Info</h2>

  <div class="card", id ="info">
    <img src="img/p1.jpg" alt="pflanze 1" style="width:100%">
    <h1 class="title"></h1>
    <p class="price",id="articlePrice"></p>
    <p class="description"></p>
    <p><button class="addToCart">Add to Cart</button></p>
  </div>

  <script type="text/javascript">

    var url = window.location.search;
    var articleId = url.replace('?id=', '');

    document.querySelector(".addToCart").addEventListener("click", function() {
      addToCart(article.id)
    })


  </script>
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="js/integration.js"></script>
</body>

</html>

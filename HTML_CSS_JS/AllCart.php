<!DOCTYPE html>
<html>
  <head>
    <title>Spielerei mit Tabellen: Zebrastreifen</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>

    <header class="main-header">
      <nav class="main-navbar">
        <ul>
          <li><a href="About.html"><img src="./img/logo.svg" alt="logo of the plantstore" ></a></li>
          <li><a class="navpoints" href="article.php">Home</a></li>
          <li><a class="navpoints" href="shoppingcart.html">Dein Warenkorb</a></li>
        </ul>
    </nav>
  </header>

    <table id="cart">
        <caption>All Carts</caption>
            <col width=50> 
            <col width=200> 
            <col width=200>
            <col width=300>  
        <thead>
        <tr>
          <th>Nr</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Preis &#8364;</th>
          <th>Aktion </th>
            
        </tr>
        </thead>
        <tbody> 
        <tr>
          <td>1</td>
          <td>Maik</td>
          <td>1</td>
          <td>13.90</td>
          <td>  
            <form method="GET" action="shoppingcart.html">
            <input type="hidden" name="username" value="Maik">
            <p><input type="submit" value="Zum Warenkorb"></p>
            </form> 
          </td>
        </tr>

        <tr>
          <td>2</td>
          <td><p>paul</p></td>
          <td>1</td>
          <td>13.90</td>
          <td>  
            <form method="GET" action="shoppingcart.html">
            <input type="hidden" name="username" value="Paul">
            <p><input type="submit" value="Zum Warenkorb"></p>
            </form> 
          </td>
        </tr>

        <tr>
          <td>3</td>
          <td><p>Mahmoud</p></td>
          <td>1</td>
          <td>13.90</td>
          <td>  
            <form method="GET" action="shoppingcart.html">
            <input type="hidden" name="username" value="Mahmoud">
            <p><input type="submit" value="Zum Warenkorb"></p>
            </form> 
          </td>
        </tr>
        </tbody>
        </table>
      
  </body>
</html>
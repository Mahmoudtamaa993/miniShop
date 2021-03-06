<!DOCTYPE html>
<html>

<head>
  <title>Spielerei mit Tabellen: Zebrastreifen</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <header class="navbar">
    <nav class="main-navbar‚">
      <ul>
        <li><a href="About.html"><img src="./img/logo.svg" alt="logo of the plantstore" ></a></li>
        <li><a class="navpoints" href="article.php">Home</a></li>
      </ul>
  </nav>
    
</header>
  <table id="cart-items" class="container content-section">
  <?php
  session_start();
  if (isset($_SESSION['username'])) { $username=$_SESSION['username']; $str ='<caption>'.'Shoppingcart of'.'   '.$username.' </caption>'; echo $str ; ?> 
  <?php } ?>
    
    <col width=200>
    <col width=200>
    <col width=200>
    <col width=200>
    <col width=200>
    <thead>
      <tr class="section-header">
        <th>Article</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total &#8364;</th>
        <th>Remove</th>

      </tr>
    </thead>
    <tbody id="cartItemsTableBody">
      

    </tbody>
  </table>

  <table>
    <col width=200>
    <col width=200>
    <col width=200>
    <col width=200>
    <col width=200>
    <tbody>
      <tr class="cart-total">
        <td colspan="3" class="cart-total-title">Total</td>
        <td class="cart-total-price"></td>
        <td><button id="insert" type="submit">Proceeed to Checkout</button></td>
      </tr>
      
    </tbody>
  </table>
  <p id="infoInsert"></p>
  <script type="text/javascript" src="js/cart.js"></script>
  <script type="text/javascript" src="js/insertOrders.js"></script>
  <script>
    var cartItems = getCartItems()

    for (let index = 0; index < cartItems.length; index++) {
      const cartItem = cartItems[index];
      var html = `
      <tr class="cart-row">
        <td class="cart-item">${cartItem.name}</td>
        <td class="cart-price">${cartItem.price}</td>
        <td class="cart-quantity">
          <div class="quantity">
            <input class="cart-quantity-input" type="number" name="quantity" min="1" max="10"
            value="${cartItem.quantity}">
          </div>
        </td>
        <td>
          <input class="articleId" type="hidden" value="${cartItem.id}" />
          <div class="item-total">${cartItem.quantity * cartItem.price}</div>
        </td>
        <td><button class="item-remove">Remove</button></td>
      </tr>
      `
      document.getElementById("cartItemsTableBody").innerHTML += html
    }


    if (window.location.search != '') {
      var url = window.location.search;
      document.getElementById("username").innerHTML = url.replace('?username=', '');;
    }

    function updateCartTotal() {
      var cartItemContainer = document.getElementById('cart-items')
      var cartRows = cartItemContainer.getElementsByClassName('cart-row')
      var total = 0
      for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        //var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        var price = priceElement.textContent.replace("€", "")
        var itemTotal = price * quantity
        cartRow.querySelector(".item-total").textContent = itemTotal
        total = total + itemTotal
      }
      total = Math.round(total * 100) / 100
      document.getElementsByClassName('cart-total-price')[0].innerText =  total
    }

    function removeItem(event) {
      var itemId = event.target.closest("tr").querySelector(".articleId").value
      removeCartItem(itemId)
      event.target.closest("tr").remove()
      updateCartTotal()
    }

    document.querySelectorAll(".cart-quantity-input").forEach(elem => {
      elem.addEventListener('change', updateCartTotal)
    })

    document.querySelectorAll(".item-remove").forEach(elem => {
      elem.addEventListener("click", removeItem)
    })

    updateCartTotal()
  </script>
</body>

</html>
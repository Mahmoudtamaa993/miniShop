

<!DOCTYPE html>
<html>

<head>
  <title></title>

</head>

<body>
  
  <form action="http://localhost/miniShop/PHP/updateArticle.php" method="post" enctype="multipart/form-data">
    <div class="input">
        <input id="SelectedId" name="SelectedId" placeholder="Name" type="text" required class="validate" autocomplete="off">
    </div>
    <div class="input">
        <input id="test" name="test" placeholder="image path" type="text" required class="validate" autocomplete="off">
    </div>
    <div class="input">
        <input id="SelectedName" name="SelectedName" placeholder="Name" type="text" required class="validate" autocomplete="off">
    </div>
    
    <div class="input">
        <input id="selectedPrice" name ="selectedPrice" placeholder="Price" type="currency" required class="validate" autocomplete="off">
    </div>
    
    <div class="input">
        <input id="selectedQuantity" name="selectedQuantity" placeholder="Quantity" type="number" required class="validate" autocomplete="off">
    </div>
    <div class="upload">
        <label id="lable">Description</label> <br>
        <textarea id="selectedDescriptionText" name="selectedDescriptionText" placeholder="Quantity"  rows="4" cols="20">
        </textarea>
    </div>

    <div>
        <label for="file">Datei auswählen</label>
        <input type="file" name="selectedImage" id="selectedImage">
    </div>
      <div>   
        <input type="submit" name="submitUpdate" value="Update" />
    </div>   
  </form>
  <script type="text/javascript" src="js/integration.js"></script>
  <script type="text/javascript" src="js/cart.js"></script>
  <script>
    function getSelectedCartItem() {
      return JSON.parse(localStorage.getItem("selectedArticle") || "[]")
    }
    window.addEventListener("load", showSelectedArticle);
    function showSelectedArticle(){
      var selected = getSelectedCartItem()
      console.log(selected);
      document.getElementById("SelectedId").value = selected.id;
      document.getElementById("SelectedName").value = selected.name;
      document.getElementById("selectedPrice").value = selected.price;
      document.getElementById("selectedQuantity").value = selected.Quantity;
      document.getElementById("selectedDescriptionText").innerHTML = selected.description;
      document.getElementById("test").value= selected.img;
      
   
    }
  </script>

 
</body>

</html>
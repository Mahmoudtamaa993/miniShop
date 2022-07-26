function getCartItems() {
    return JSON.parse(localStorage.getItem("cart") || "[]")
}

function saveCartItems(items) {
    localStorage.setItem("cart", JSON.stringify(items))
}

function addArticleToCart(article) {
    var cartStorage = getCartItems()
    var articleExists = cartStorage.find(function(elem) { return elem.id === article.id })
    if (!articleExists) {
        var cartItem = {
            ...article,
            quantity: 1
        }
        cartStorage.push(cartItem)
    } else {
        cartStorage.map(elem => {
            if (elem.id === article.id) {
                elem.quantity += 1
            }
            return elem
        })
    }
    saveCartItems(cartStorage)
    console.log("test")
    alert("Article was added :) ")
}

function removeCartItem(id) {
    var cartStorage = getCartItems()
    var newStorage = cartStorage.filter(elem => elem.id != id)
    saveCartItems(newStorage)
}
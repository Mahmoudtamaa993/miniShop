var articles = [{
        id: 1,
        title: "Pflanze 1",
        description: "Das eine schoene Pflanze 1",
        price: 13.90
    },
    {
        id: 2,
        title: "Pflanze 2",
        description: "Das eine schoene Pflanze 1",
        price: 5.99
    },
    {
        id: 3,
        title: "Pflanze 3",
        description: "Das eine schoene Pflanze 3",
        price: 9.99
    }
]


function getCartItems() {
    return JSON.parse(localStorage.getItem("cart") || "[]")
}

function saveCartItems(items) {
    localStorage.setItem("cart", JSON.stringify(items))
}

function addToCart(id) {
    var article = articles.find(elem => elem.id === id)
    var cartStorage = getCartItems()
    var articleExists = cartStorage.find(elem => elem.id === id)
    if (!articleExists) {
        var cartItem = {
            ...article,
            quantity: 1
        }
        cartStorage.push(cartItem)
    } else {
        cartStorage.map(elem => {
            if (elem.id === id) {
                elem.quantity += 1
            }
            return elem
        })
    }
    saveCartItems(cartStorage)
    alert("Article was added :) ")
}

function removeCartItem(id) {
    var cartStorage = getCartItems()
    var newStorage = cartStorage.filter(elem => elem.id != id)
    saveCartItems(newStorage)
}
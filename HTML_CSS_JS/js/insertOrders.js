window.addEventListener("load", init);

function init() {

    document.getElementById("insert").addEventListener("click", insertOrder);
    
} 

function insertOrder() {
    
    var cartStorage = getCartItems();
   // console.log(cartStorage.length);
    for(let i=0; i <= cartStorage.length  -1 ;i++ ){
        let articleID = cartStorage[i].id;
        let quantity = cartStorage[i].quantity;
        let yourDate = new Date()
       
        let date = yourDate.toISOString().split('T')[0]
    
        var formData = new FormData();
        formData.append('articleID', articleID);
        formData.append('Quantity', quantity);
        formData.append('pDate', date);
    
        var ajaxRequest = new XMLHttpRequest();
        ajaxRequest.addEventListener("load", ajaxInsertOrder);
        ajaxRequest.addEventListener("error", ajaxFehler);
        ajaxRequest.open("POST", "../php/insertOrder.php");
        ajaxRequest.send(formData);
        removeCartItem(cartStorage[i].id) 
    }
}

// Falls das Buch erfolgreicht inzugefügt ist ...
function ajaxInsertOrder(event) {
    document.getElementById("infoInsert").innerHTML = "Thanks for your Order!";  
}

function ajaxFehler(event) {
    alert(event.target.statusText);
}

window.addEventListener("load", init);

function init() {

    document.getElementById("insert").addEventListener("click", insertOrder);
    
} 

function insertOrder() {
    
    var cartStorage = getCartItems();
   // console.log(cartStorage.length);
    for(let i=0; i <= cartStorage.length  -1 ;i++ ){
    

        
        
    
    
    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.addEventListener("load", ajaxInsertOrder);
   // ajaxRequest.addEventListener("error", ajaxFehler);
    ajaxRequest.open("POST", "../php/fetchArticles.php");
    ajaxRequest.send();
}
}

// Falls das Buch erfolgreicht inzugefügt ist ...
function ajaxInsertOrder(event) {
    
}
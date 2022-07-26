window.addEventListener("load", showResult);

function showResult() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.addEventListener("load", ajaxShowArticles);
    xmlhttp.addEventListener("error", ajaxFehler);
    
    xmlhttp.open("GET", "../php/fetchArticles.php");
    xmlhttp.send();
}

function ajaxShowArticles(event) {
    var myObj = JSON.parse(event.target.responseText);

    var tbody = document.getElementById("articleTableBody");
    for (let i=0; i<myObj.length; i++) {
        

        var tr = document.createElement("tr");
        // id    
        var td1 = document.createElement("td");
        let id = myObj[i]['id'];
        console.log(id)
        td1.appendChild(document.createTextNode(id));
        tr.appendChild(td1);
        //article Info
        var td2 = document.createElement("td");
        const articleInfo = document.createElement("button");
        var name = myObj[i]['name'];
        articleInfo.innerHTML = name;
        articleInfo.addEventListener("click",function() {
            localStorage.setItem("articleInfo", JSON.stringify(myObj[i]))
            window.location.href = "ArticleInfo.html";
        })
        td2.appendChild(articleInfo);
        tr.appendChild(td2);
        // price
        var td4 = document.createElement("td");
        var price = myObj[i]['price'];
        td4.appendChild(document.createTextNode(price));
        tr.appendChild(td4);
        // image
        var td5 = document.createElement("td");
        var bild = myObj[i]['img'];
        var img = document.createElement("IMG");
        img.height = 60;
        img.width = 60;
        img.src = bild;
        td5.appendChild(img);
        tr.appendChild(td5);
        //Quantity
        var td6 = document.createElement("td");
        var amount = myObj[i]['Quantity'];
        td6.appendChild(document.createTextNode(amount));
        tr.appendChild(td6);
        // Add to cart 
        var td7 = document.createElement("td");
        const btn = document.createElement("button");
        btn.innerHTML = "Add To Cart";
        btn.addEventListener("click",function() {
            addArticleToCart(myObj[i])
        })
        td7.appendChild(btn);
        tr.appendChild(td7);


        var username = myObj[i]['usernames'];

        if (username == "admin"){
            // Delete
            var td8 = document.createElement("td");
            const deleteArticle = document.createElement("button");
            var btnTest = "Delete"
            deleteArticle.innerHTML = btnTest;
            deleteArticle.addEventListener("click",function() {  
                deleteArticles(myObj[i])
            })
            td8.appendChild(deleteArticle);
            tr.appendChild(td8);
            // Update
            var td9 = document.createElement("td");
            const updateArticle = document.createElement("button");
            var btnTest = "update"
            updateArticle.innerHTML = btnTest;
            updateArticle.addEventListener("click",function() {
                CreateCartItems(myObj[i])
                window.location.href = "updateArticles.html";
            })
            td9.appendChild(updateArticle);
            tr.appendChild(td9);
        }
        tbody.appendChild(tr);
    }
}
function CreateCartItems(item) {
    localStorage.setItem("selectedArticle", JSON.stringify(item))
}

function deleteArticles(article){
    let articleID = article.id;
    var formData = new FormData();
    formData.append('articleID', articleID);

    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.addEventListener("load", ajaxDeleteArticle);
    ajaxRequest.addEventListener("error", ajaxFehler);
    ajaxRequest.open("POST", "../php/deleteArticle.php");
    ajaxRequest.send(formData);
}

function ajaxDeleteArticle(event) {
    document.getElementById("ajaxinfo").innerHTML = "article was deleted";  
}

function ajaxFehler(event) {
    alert(event.target.statusText);
}


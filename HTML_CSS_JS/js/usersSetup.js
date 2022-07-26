window.addEventListener("load", showResult);

function showResult() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.addEventListener("load", ajaxShowUsers);
    xmlhttp.addEventListener("error", ajaxFehler);
    
    xmlhttp.open("GET", "../php/fetchUsers.php");
    xmlhttp.send();
}

function ajaxShowUsers(event) {
    var myObj = JSON.parse(event.target.responseText);
    var tbody = document.getElementById("userTableBody");
    for (let i=0; i<myObj.length; i++) {
        

        var tr = document.createElement("tr");
        // id    
        var td1 = document.createElement("td");
        let id = myObj[i]['id'];

        td1.appendChild(document.createTextNode(id));
        tr.appendChild(td1);

        // Firstname    
        var td2 = document.createElement("td");
        let firstName = myObj[i]['firstName'];

        td2.appendChild(document.createTextNode(firstName));
        tr.appendChild(td2);

        // lastname    
        var td3 = document.createElement("td");
        let lastName = myObj[i]['lastName'];
        td3.appendChild(document.createTextNode(lastName));
        tr.appendChild(td3);
        // email
        var td4 = document.createElement("td");
        var email = myObj[i]['email'];
        td4.appendChild(document.createTextNode(email));
        tr.appendChild(td4);
        // username
        var td5 = document.createElement("td");
        var username = myObj[i]['userName'];
        td5.appendChild(document.createTextNode(username));
        tr.appendChild(td5);
        //Quantity
        var td6 = document.createElement("td");
        var password = myObj[i]['password'];
        td6.appendChild(document.createTextNode(password));
        tr.appendChild(td6);
        //Delete
        var td8 = document.createElement("td");
        const deleteUser = document.createElement("button");
        var btnTest = "Delete"
        deleteUser.innerHTML = btnTest;
        deleteUser.addEventListener("click",function() {  
            deleteUsers(myObj[i])
        })
        td8.appendChild(deleteUser);
        tr.appendChild(td8);
        // Update
        var td9 = document.createElement("td");
        const updateUser = document.createElement("button");
        var btnTest = "update"
        updateUser.innerHTML = btnTest;
        updateUser.addEventListener("click",function() {
            CreateCartItems(myObj[i])
            window.location.href = "updateUser.html";
        })
        td9.appendChild(updateUser);
        tr.appendChild(td9);

        tbody.appendChild(tr);
        }
    }

function CreateCartItems(item) {
    localStorage.setItem("selectedUser", JSON.stringify(item))
}

function deleteUsers(user){
    let userID = user.id;
    var formData = new FormData();
    formData.append('UserID', userID);

    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.addEventListener("load", ajaxDeleteArticle);
    ajaxRequest.addEventListener("error", ajaxFehler);
    ajaxRequest.open("POST", "../php/deleteUser.php");
    ajaxRequest.send(formData);
}

function ajaxDeleteArticle(event) {
    document.getElementById("ajaxinfo").innerHTML = "User was deleted";  
}

function ajaxFehler(event) {
    alert(event.target.statusText);
}


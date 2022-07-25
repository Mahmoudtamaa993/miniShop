<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Register">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>

    <header class="navbar">
        <nav class="main-navbar">
            <ul>
              <li><a href="About.html"><img src="./img/logo.svg" alt="logo of the plantstore" ></a></li>
              <li><a class="navpoints" href="article.php">Home</a></li>
              <li><a class="navpoints" href="shoppingcart.html">Dein Warenkorb</a></li>
            </ul>
        </nav>

    <div id="container-register">
        <div id="title">
            Register
        </div>

        <form action="http://localhost/miniShop/PHP/register.php" method="post">
            <div class="input">
                <input id="name" name="name" placeholder="first name" type="text" required class="validate" autocomplete="off">
            </div>
            
            <div class="input">
                <input id="lastname" name="lastname" placeholder="last name" type="text" required class="validate" autocomplete="off">
            </div>
            
            <div class="input">
                <input id="email" name="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
            </div>
            <div class="input">
                <input id="username" name="username" placeholder="Username" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="input">
                <input id="pswd1" name="pswd1" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>
            <div class="input">
                <input id="pswd2" name="pswd2" placeholder="repeat Password" type="password" required class="validate" autocomplete="off">
            </div>

            <input type="submit" name="register" id="register" value="Register" /> <br>

            

        </form>
        
        &nbsp;<span id="sName" style="color:red;"></span> <br>           
        &nbsp;<span id="sLastName" style="color:rgb(26, 255, 0);"></span> <br>
        &nbsp;<span id="sEmail" style="color:rgb(0, 255, 213);"></span><br>
        &nbsp;<span id="sPswd" style="color:rgb(246, 243, 243);"></span><br>
        &nbsp;<span id="sMatchPswd" style="color:rgb(55, 9, 237);"></span>



        <div class="register">
            Do you already have an account?
            <a href="./userLogin.php"><button id="register-link">Log In here</button></a>
        </div>
    </div>
    <script>
        window.addEventListener("load", setup);
    
        function setup() {
            document.getElementById("name").addEventListener("change", isName);
            document.getElementById("lastname").addEventListener("change", islastName);
            document.getElementById("email").addEventListener("change", isEmail);
            document.getElementById("pswd1").addEventListener("change", checkPassword);
            document.getElementById("pswd2").addEventListener("change", matchPassword);
        }
        
        function isName() {
            //console.log(event);
            var patt = /^[A-Z]([a-z]*)$/;
            var name = document.getElementById("name").value;
            if (!name.match(patt)) {
                document.getElementById("sName").innerHTML = "Die Vorname sollte eine Zeichenfolge mit einem Großbuchstaben, gefolgt von Kleinbuchstaben, sein."}else{
                    document.getElementById("sName").innerHTML ="";
                }
        }
        function islastName() {
            var patt = /^[A-Z]([a-z]*)$/;
            var name = document.getElementById("lastname").value;
            if (!name.match(patt)) {
                document.getElementById("sLastName").innerHTML = "Die Nachname sollte eine Zeichenfolge mit einem Großbuchstaben, gefolgt von Kleinbuchstaben, sein."}else{
                    document.getElementById("sLastName").innerHTML ="";
                }
        }
        function isEmail() {        
            const re =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            var email = document.getElementById("email").value;
            if (!email.match(re)) {
                document.getElementById("sEmail").innerHTML = "Ist Keine Gülltige Email Format"
            }else{
                    document.getElementById("sEmail").innerHTML ="";
            }
        }

        function matchPassword(){  
            const pw1 = document.getElementById("pswd1").value;  
            const pw2 = document.getElementById("pswd2").value; 
            if(pw1 === pw2)  
            {   
                return (document.getElementById("sMatchPswd").innerHTML = ""); 
                
            } else {  
                return (document.getElementById("sMatchPswd").innerHTML = "Passwords did not match");
            }  
        } 

        function checkPassword (){             
           const str = document.getElementById("pswd1").value;
            if (str.length < 5) {
                return (document.getElementById("sPswd").innerHTML = "too_short");
            }  else if (str.search(/\d/) == -1) {
                return (document.getElementById("sPswd").innerHTML = "no_num");
            } else if (str.search(/[a-z]/) == -1) {
                return (document.getElementById("sPswd").innerHTML = "no_Small_letter");
            } else if (str.search(/[A-Z]/) == -1) {
                return (document.getElementById("sPswd").innerHTML = "no_Kapital_letter");
            }
            return (document.getElementById("sPswd").innerHTML = "");
        }
        
        </script>
</body>

</html>

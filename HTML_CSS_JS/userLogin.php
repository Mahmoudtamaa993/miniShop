<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
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

    <div id="container-login" name="container-login" >
        <div id="title">
            Login
        </div>

        <form action="http://localhost/miniShop/PHP/login.php" method="post">
            <div class="input">
                <input id="email" name="email" placeholder="Eamil" type="text" required class="validate" autocomplete="off">
            </div>

            <div class="input">
                <input id="pswd1" name="pswd1" placeholder="Password" type="password" required class="validate" autocomplete="off">
            </div>

            <div>
                <input id ="login" name ="login" type="submit" value="Log In"/>
            </div>
            
            &nbsp;<span id="s2" style="color:red;"></span>   
        </form>


        <div class="register">
            Don't have an account yet?
            <a href="./userRegister.php"><button id="register-link">Register here</button></a>
        </div>
        
    </div>
    <script>
        window.addEventListener("load", setup);
    
        function setup() {
            document.getElementById("name").addEventListener("change", isEmail);
        }
        
        function isEmail() {
            const re =/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            var email = document.getElementById("name").value;
            if (!email.match(re)) {
                document.getElementById("s2").innerHTML = "Ist Keine Gülltige Email Format sein"
            }else{
                document.getElementById("s2").innerHTML = "";
            }
        }

    
        </script>
</body>

</html>

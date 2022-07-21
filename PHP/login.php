<?php
include './inc/setupDB.php';
$errors = array();
// LOGIN USER
session_start();
if (isset($_POST['login'])){
    $email= mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['pswd1']);

    if (empty($email)) {
        array_push($errors, "Username is required");
    }else
    if (empty($password)) {
        array_push($errors, "Password is required");
    }else{
        $password = md5($password);
        $query = "SELECT id,username FROM users WHERE email='$email'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $username = $row["username"];
            $id = $row["id"];
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['success'] = "You are now logged in";
            header('location: http://localhost/miniShop/HTML_CSS_JS/article.php');

        }
    }
}

if (count($errors) > 0){
    foreach ($errors as $error){
      echo $error;
    }   
}
?>
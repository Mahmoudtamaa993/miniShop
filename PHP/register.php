<?php
include './inc/setupDB.php';
// Register User


session_start();
// initializing variables
$firstName = '';
$lastname = '' ;
$email = '' ;
$userName = '';
$pswd = '';
$pswd2 = '';
$errors = array(); 

// REGISTER USER
if (isset($_POST['register'])) {
    // receive all input values from the form
    $firstName = mysqli_real_escape_string($db, $_POST['name']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $userName = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['pswd1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['pswd2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstName)) { array_push($errors, "firstName is required"); }
    if (empty($lastname)) { array_push($errors, "lastname is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($userName)) { array_push($errors, "Username is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same email
    $user_check_query = "SELECT * FROM users WHERE username='$userName' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $userName) {
        array_push($errors, "user already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $query = "INSERT INTO Users (firstname, lastname, email,username, pswd)
                VAlUES ('$firstName', '$lastName', '$email','$userName', '$password')";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastname;
        $_SESSION['userName'] = $userName;
        $_SESSION['success'] = "You are now logged in";
        header('location: http://localhost/miniShop/HTML_CSS_JS/article.php');
    }
    else{
      if (count($errors) > 0){
        foreach ($errors as $error){
          echo $error;
        }   
      }
    }
  }

  mysqli_close($db);
?>

<?php
include './inc/setupDB.php';
// Register User


session_start();
// initializing variables
$firstName = '';
$lastName = '' ;
$email = '' ;
$userName = '';
$pswd = '';
$pswd2 = '';
$errors = array(); 

// REGISTER USER
if (isset($_POST['submitUpdate'])) {
    // receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['SelectedId']);
    $firstName = mysqli_real_escape_string($db, $_POST['SelectedFirstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['SelectedLastName']);
    $email = mysqli_real_escape_string($db, $_POST['SelectedEmail']);
    $userName = mysqli_real_escape_string($db, $_POST['SelectedUserName']);
    $password = mysqli_real_escape_string($db, $_POST['SelectedPassword']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstName)) { array_push($errors, "firstName is required"); }
    if (empty($lastName)) { array_push($errors, "lastname is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($userName)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }



    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      $query = "UPDATE users SET firstname='$firstName', lastname='$lastName', email='$email',  username='$userName',pswd='$password' WHERE id = $id";
      mysqli_query($db, $query);
        header('location: http://localhost/miniShop/HTML_CSS_JS/users.php');
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
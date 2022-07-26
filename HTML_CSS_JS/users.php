<!DOCTYPE html>
<html>
  <head>
    <title>Users</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
  <script type="text/javascript" src="js/usersSetup.js"></script> 
  <nav class="main-navbar">
        <ul>
          <li><a href="About.html"><img src="./img/logo.svg" alt="logo of the plantstore" ></a></li>
          <li><a class="navpoints" href="article.php">Home</a></li>
        </ul>
  </nav>

  <table id="user">
    <thead id ="theads">
      <tr>
          <th>id</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>email </th>
          <th>username </th>
          <th>password</th>
      </tr>  
    </thead>

    <tbody id="userTableBody">
    </tbody>

  </table> 
  <p id="ajaxinfo"></P>
  </body>
</html>
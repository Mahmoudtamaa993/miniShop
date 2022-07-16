<?php
include './inc/setupDB.php';


$sql = "SELECT users.username,articles.name, orders.Quantity, orders.pDate FROM Orders, users, articles where users.id = userid AND articles.id = articleID";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>User Name</th>";
                echo "<th>article Name</th>";
                echo "<th>quantity</th>";
                echo "<th>date</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['Quantity'] . "</td>";
                echo "<td>" . $row['pDate'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
// Close connection
mysqli_close($db);
?>
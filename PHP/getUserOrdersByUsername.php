<?php
include './inc/setupDB.php';

$username ='Mahmoud';
$sql = "SELECT articles.name, orders.Quantity, orders.pDate FROM Orders, users, articles where users.id = userid AND articles.id = articleID AND users.username='$username'";
$result = $db->query($sql);
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

$ps = json_encode($rows);
echo ($ps);

if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Article Name</th>";
                echo "<th>Quantity</th>";
                echo "<th>Date</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
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
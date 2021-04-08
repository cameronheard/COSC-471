<?php
require 'dbConnection.php';
function getOrdersByStoreID($storeID){
    global $conn;
    $sql = "SELECT O.ID, O.Quantity, O.Date, O.CustomerID, O.ProductID, O.CourierID FROM Orders O
            RIGHT JOIN Product P ON P.ID = O.ProductID
            WHERE P.StoreID = '$storeID';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['ID']."</td><td>".$row['Quantity']."</td><td>".$row['Date']."</td><td>".$row['CustomerID']."</td><td>".$row['ProductID']."</td><td>".$row['CourierID']."</td></tr>";
        }
    }
}
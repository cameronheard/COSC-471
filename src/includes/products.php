<?php
require 'dbConnection.php';

function getProductsByStoreID($storeID){
    global $conn;
    $sql = "SELECT * FROM Product WHERE StoreID='$storeID'";
    $result = mysqli_query($conn, $sql);
    $buttonCounter = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>$".$row['Price']."</td><td>".$row['Stock']."</td><td><button class='removeProduct' type='submit' name='deleteProductID' value='" . $row['ID'] . "'>Remove Product</button><button class='editProduct' type='submit' name='editProductID' value='" . $row['ID'] . "'>Edit Product</button></td></tr>";
            if($buttonCounter % 2 == 1) {
                echo "<br>";
            }
            $buttonCounter++;
        }
    }
}

function deleteProductByID($productID){
    global $conn;
    $sql = "SELECT StoreID FROM Product WHERE ID='$productID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
        $storeID = $row['StoreID'];
    }
    $sql = "DELETE FROM Product WHERE ID='$productID'";
    mysqli_query($conn, $sql);
    return $storeID;
}

function editProductByID($productID){
    global $conn;
    $sql = "DELETE FROM Product WHERE ID='$productID'";
    mysqli_query($conn, $sql);
}
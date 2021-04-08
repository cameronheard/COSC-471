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

function createProduct($storeID){
    global $conn;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $sql="INSERT INTO Product (Name, Price, Stock, StoreID) VALUES ('$name','$price','$stock','$storeID')";
    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    } else {
        return "Error: " . mysqli_error($conn);
    }
}

function populateProductForm($productID){
    global $conn;
    $sql="SELECT * FROM Product WHERE ID='$productID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
        $name = $row['Name'];
        $price = $row['Price'];
        $stock = $row['Stock'];
        $storeID = $row['StoreID'];
        echo "
            <label for='name'>Product Name</label>
        <input type='text' id='name' name='name' value='". $name . "'><br>
        <label for='price'>Price</label>
        <input type='number' id='price' name='price' step='any' value='". $price . "'><br>
        <label for='stock'>Stock</label>
        <input type='number' id='stock' name='stock' value='". $stock . "'><br>
        <input type='hidden' name='storeID' value='". $storeID . "'>
        <input type='hidden' name='productID' value='". $productID . "'>
        <input type='submit' value='Submit' name='Submit'>
        ";
    }
}

function editProduct($productID){
    global $conn;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql="UPDATE Product SET Name='$name', Price='$price', Stock='$stock' WHERE ID='$productID'";

    mysqli_query($conn, $sql);
}
<?php
require 'dbConnection.php';

function getSellerName($sellerID){
    global $conn;
    $sql = "SELECT Fname, Lname FROM Seller WHERE ID='$sellerID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
            echo $row['Fname'] . " " . $row['Lname'];
    }
}
function buttonsForStores($sellerID){
    global $conn;
    $sql = "SELECT Name, ID FROM Store WHERE SellerID='$sellerID'";
    $result = mysqli_query($conn, $sql);
    $buttonCounter = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<button class='storeButton' type='submit' name='storeID' value='" . $row['ID'] . "'>" . $row['Name'] . "</button>";
            if($buttonCounter % 2 == 1) {
                echo "<br>";
            }
            $buttonCounter++;
        }
    }
}

function getStoreName($storeID){
    global $conn;
    $sql = "SELECT Name FROM Store WHERE ID='$storeID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
        echo $row['Name'];
    }
}

function newStoreButton($sellerID){
    echo "<button class='button' type='submit' name='sellerID' value='" . $sellerID . "'>New Store</button>";
}

function createStore($sellerID){
    global $conn;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $apt = $_POST['apt'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $phone = $_POST['[phone'];
    $desc = $_POST['desc'];

    $sql="INSERT INTO Store (Name, Email, Street, Apt, City, State, Zip, Country, PhoneNo, Description, SellerID) VALUES ('$name','$email','$street','$apt','$city','$state','$zip','$country','$phone','$desc','$sellerID')";

    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    } else {
        return "Error: " . mysqli_error($conn);
    }

}
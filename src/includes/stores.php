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

function populateStoreForm($storeID){
    global $conn;
    $sql="SELECT * FROM Store WHERE ID='$storeID'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
        $name = $row['Name'];
        $email = $row['Email'];
        $street = $row['Street'];
        $apt = $row['Apt'];
        $city = $row['City'];
        $state = $row['State'];
        $zip = $row['Zip'];
        $country = $row['Country'];
        $phone = $row['PhoneNo'];
        $desc = $row['Description'];
        echo "
        
            <label for='name'>Name</label>
            <input type='text' id='name' name='name' value='". $name . "' required><br>
            <label for='email'>Email</label>
            <input type='email' id='email' name='email' value='". $email . "'><br>
            <label for='phone'>Phone Number</label>
            <input type='tel' id='phone' name='phone' value='". $phone . "'><br>
            <label for='desc'>Store Description</label>
            <textarea rows='4' cols='50' id='desc' name='desc'>". $desc . "</textarea><br>
            <p>Address</p><br>
            <label for='street'>Street Address</label>
            <input type='text' id='street' name='street' value='". $street . "'><br>
            <label for='apt'>APT #</label>
            <input type='text' id='apt' name='apt' value='". $apt . "'>
            <label for='city'>City</label>
            <input type='text' id='city' name='city' value='". $city . "'><br>
            <label for='state'>State/Province</label>
            <input type='text' id='state' name='state' value='". $state . "'><br>
            <label for='country'>Country</label>
            <input type='text' id='country' name='country' value='". $country . "'><br>
            <label for='zip'>Postal Code</label>
            <input type='text' id='zip' name='zip' value='". $zip . "'><br>
            <input type='hidden' name='storeID' value='". $storeID . "'>
            <input type='submit' name= 'Submit' value='Submit'>
        ";
    }
}

function editStore($storeID){
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

    $sql="UPDATE Store SET Name='$name', Email='$email', Street='$street', Apt='$apt', City='$city', State='$state', Zip='$zip', Country='$country', PhoneNo='$phone', Description='$desc' WHERE ID='$storeID'";

    mysqli_query($conn, $sql);
}
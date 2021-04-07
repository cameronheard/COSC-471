<?php
require 'dbConnection.php';

// Function prints customer's first and last name based off $customerID.
function getCustomerName($customerID){
    // Get the database connection.
    global $conn;

    // Create a query retrieving first and last name based on $customerID.
    $sqlQuery = "SELECT Fname, Lname FROM Customer WHERE ID='$customerID'";

    // Send query to database and store result.
    $result = mysqli_query($conn, $sqlQuery);

    // If result is non-empty print first and last name.
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)){
            echo $row['Fname'] . " " . $row['Lname'];
    }
}

// Function prints out customer information based on $customerID.
function printCustomerInformation($customerID) {
    // Get the database connection.
    global $conn;

    // Create a query for retrieving each attribute based on customerID.
    $sqlQuery = "SELECT Fname, Lname, Email, PhoneNo, Street, Apt, City, 
        State, Country, Zip FROM customer WHERE ID='$customerID'";
    
    // Send query to database and store result.
    $result = mysqli_query($conn, $sqlQuery);

    // If the result is non-empty print each attribute.
    if (mysqli_num_rows($result) > 0 && $row = mysqli_fetch_assoc($result)) {
        echo "<h2>First Name: " . $row['Fname'] . " </h2>";
        echo "<h2>Last Name: " . $row['Lname'] . " </h2>";
        echo "<h2>Email: " . $row['Email'] . " </h2>";
        echo "<h2>Phone Number: " . $row['PhoneNo'] . " </h2>";
        echo "<h2>Street: " . $row['Street'] . " </h2>";
        echo "<h2>Apt: " . $row['Apt'] . " </h2>";
        echo "<h2>City: " . $row['City'] . " </h2>";
        echo "<h2>State: " . $row['State'] . " </h2>";
        echo "<h2>Country: " . $row['Country'] . " </h2>";
        echo "<h2>Zip: " . $row['Zip'] . " </h2>";
    }
}
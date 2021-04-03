<?php
require 'dbConnection.php';
function getStoreButtonsBySellerID($sellerID){
    global $conn;
    $sql = "SELECT StoreName FROM Store WHERE sellerID='$sellerID'";
    $result = mysqli_query($conn, $sql);
    $toggle = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<input class='button' type='button' value='" . $row['StoreName'] . "'>";
            if($toggle == 0){
                $toggle = 1;
            } else {
                echo "<br>";
                $toggle = 0;
            }

        }
    }
    mysqli_close($conn);
}
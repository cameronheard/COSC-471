<?php
include("../includes/dbConnection.php");

session_start();

$customerID = $_SESSION["user"]["id"];
$productID = $_POST['productID'];
$quantity = $_POST['quantity'];
$date = '2021-04-13';
$courierID='1';

echo $customerID;
echo $productID;
echo $quantity;
echo $date;
echo $courierID;

$query = "INSERT INTO Orders (`Quantity`, `Date`, `CustomerID`, `ProductID`, `CourierID`) VALUES('$quantity', '$date', '$customerID', '$productID', '$courierID')";
                        mysqli_query($conn, $query);
                    

?>
<?php
header("Location: customer-dashboard.php");
?>
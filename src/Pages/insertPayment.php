
<!DOCTYPE html>

<?php
include("../includes/dbConnection.php");

session_start();

echo $_POST['PaymentType'];
echo $_POST['PaymentAmount'];
echo $_POST['customerID'];


            $PaymentAmount = $_POST['PaymentAmount'];
            $PaymentType = $_POST['PaymentType'];
            $CustomerID = $_POST['customerID'];

            $query = "INSERT INTO Payment (`Amount`, `PaymentType`, `CustomerID`) VALUES('$PaymentAmount', '$PaymentType', '$CustomerID')";
                        mysqli_query($conn, $query);
                    
                

?>
<?php
header("Location: http://localhost/COSC-471/src/pages/MyOrdersPage.php");
?>
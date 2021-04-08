
<?php
include("../includes/dbConnection.php");

session_start();

            $orderID = $_GET['orderID'];

            $query = "DELETE FROM Orders WHERE ID=$orderID";
                        mysqli_query($conn, $query);
                    
       echo $orderID;         

?>
<?php
header("Location: customer-dashboard.php");
?>
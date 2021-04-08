<?php
    session_start();
    $storeID = $_GET['storeID'];
    include '../includes/orders.php';
    include '../includes/stores.php';
if(array_key_exists('backToStore', $_GET)) {
    $storeID = $_GET['backToStore'];
    backToStore($storeID);
}
function backToStore($storeID){
    header("Location: ../Pages/store-dashboard.php?storeID=" . $storeID);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title><?php getStoreName($storeID) ?>'s ORDERS</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
<h1><?php getStoreName($storeID) ?>'s Orders</h1>
<form action="store-orders.php" method="get">
    <table>
        <tr>
            <th>Order ID</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Customer ID</th>
            <th>Product ID</th>
            <th>CourierID</th>
        </tr>
        <tr>
            <?php getOrdersByStoreID($storeID) ?>
        </tr>
    </table>
    <?php echo "<button type='submit' name='backToStore' class='button' value='" . $storeID . "' >Back to Store</button>";?>
</form>
</body>
</html>

<?php
    session_start();
    include '../includes/customer.php';
    $customerID = $_SESSION["user"]["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="eMarketDefault.css">
    <link rel="stylesheet" href="/COSC-471/src/static/css/base.css">
    <title><?php getCustomerName($customerID);?>'s Dashboard</title>
</head>

<body class="body">
    <?php include __DIR__ . "/../templates/navbar.php"; ?>
    
    <h1 class='header'><?php getCustomerName($customerID);?>'s Dashboard</h1>
    <button onclick="document.location='customer-find-products.php'">
    Find Products
    </button><br>
    
    <button onclick="document.location='MyOrdersPage.php'">
    My Orders
    </button><br>
    
    <button onclick="document.location='customer-my-info.php'">
    My Info
    </button><br>

    <button onclick="document.location='index.php/logout'">
    Logout
    </button>
</body>

</html>
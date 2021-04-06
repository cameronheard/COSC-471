<?php
    session_start();
    include '../includes/stores.php';
    $storeID = $_GET['storeID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title><?php getStoreName($storeID) ?></title>
</head>
<body>
    <h1><?php getStoreName($storeID) ?></h1>
    <img src="IMAGE SOURCE HERE" alt="Store Logo"><br>
    <button type="button" class="button" onclick="alert('OPEN ORDERS PAGE')" value="">Orders</button><br>
    <button type="button" class="button" onclick="alert('EDIT PRODUCTS PAGE')" value="">Products Page</button><br>
    <button type="button" class="button" onclick="alert('OPEN STORE INFO PAGE')" value="">Store Info</button><br>
</body>
</html>
<?php
    session_start();
    include '../includes/stores.php';
    $storeID = $_GET['storeID'];
    if(array_key_exists('orders', $_GET)) {
        $storeID = $_GET['orders'];
        orders($storeID);
    }
    else if(array_key_exists('products', $_GET)) {
        $storeID = $_GET['products'];
        products($storeID);
    }
    else if(array_key_exists('info', $_GET)) {
        $storeID = $_GET['info'];
        info($storeID);
    }
    else if(array_key_exists('backToSeller', $_GET)) {
        $sellerID = $_GET['backToSeller'];
        backToSeller($sellerID);
    }
    function orders($storeID) {
        header("Location: ../Pages/store-orders.php?storeID=" . $storeID);
    }
    function products($storeID) {
        header("Location: ../Pages/store-products.php?storeID=" . $storeID);
    }
    function info($storeID) {
        header("Location: ../Pages/edit-store.php?storeID=" . $storeID);
    }
    function backToSeller($sellerID) {
        header("Location: ../Pages/seller-dashboard.php?sellerID=" . $sellerID);
    }
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
    <form method="get" action="store-dashboard.php">
        <?php echo "
        <button type='submit' name='orders'
                class='button' value='" . $storeID . "' >Orders</button>
        <button type='submit' name='products'
                class='button' value='" . $storeID . "' >Products Page</button>
        <button type='submit' name='info'
                class='button' value='" . $storeID . "' >Store Info</button>
        <button type='submit' name='backToSeller'
                class='button' value='" . getSellerIDFromStoreID($storeID) . "' >Back to Seller</button>"
        ?>
    </form>
</body>
</html>
<?php
session_start();
$storeID = $_GET['storeID'];
include '../includes/stores.php';
include '../includes/products.php';

if(isset($_GET['deleteProductID'])){
    $deleteProductID = $_GET['deleteProductID'];
    $storeID = deleteProductByID($deleteProductID);
    header("Location: ../Pages/store-products.php?storeID=" . $storeID);
} elseif(isset($_GET['editProductID'])){
    $editProductID = $_GET['editProductID'];
    header("Location: ../Pages/edit-product.php?storeID=" . $storeID . "&productID=" . $editProductID);
} elseif(isset($_GET['newProduct'])){
    $storeID = $_GET['newProduct'];
    header("Location: ../Pages/new-product.php?storeID=" . $storeID);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title><?php getStoreName($storeID) ?>'s PRODUCTS</title>
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
    <h1><?php getStoreName($storeID) ?>'s Products</h1>
    <form action="store-products.php" method="get">
        <table>
            <tr>
                <th>ProductID</th>
                <th>ProductName</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Options</th>
            </tr>
            <tr>
                <?php getProductsByStoreID($storeID) ?>
            </tr>
        </table>
        <?php echo "<button class='newProduct' type='submit' name='newProduct' value='" . $storeID . "'>New Product</button>"?>
    </form>
</body>
</html>
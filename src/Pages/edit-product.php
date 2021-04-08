<?php
    session_start();
    $productID = $_GET['productID'];
    include '../includes/products.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Submit"])) {
        $productID = $_POST['productID'];
        $storeID = $_POST['storeID'];
        editProduct($productID);
        if (substr($storeID, 0, 5) === 'Error') {
            header("Location: ../Pages/create-store.php?error=true");
        } else {
            header("Location: ../Pages/store-products.php?storeID=" . $storeID);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="edit-product.php" name="editProduct">
        <?php populateProductForm($productID); ?>
    </form>
</body>
</html>
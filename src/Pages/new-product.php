<?php
session_start();
if(isset($_GET['storeID'])){
    $storeID = $_GET['storeID'];
}
include '../includes/stores.php';
include '../includes/products.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Submit"])) {
    $storeID = $_POST['storeID'];
    createProduct($storeID);
    header("Location: ../Pages/store-dashboard.php?storeID=" . $storeID);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title>New Product</title>
</head>
<body>
    <h1>New Product</h1>
    <form method="post" action="new-product.php">
        <?php echo "
        <label for='name'>Product Name</label>
        <input type='text' id='name' name='name'><br>
        <label for='price'>Price</label>
        <input type='number' id='price' name='price' step='any'><br>
        <label for='stock'>Stock</label>
        <input type='number' id='stock' name='stock'><br>
        <input type='hidden' name='storeID' value='". $storeID . "'>
        <input type='submit' value='Submit' name='Submit'>"
        ?>
    </form>
</body>
</html>
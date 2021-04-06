<?php
    session_start();
    include '../includes/stores.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title><?php getSellerName(1);?>'s Stores</title>
</head>
<body>
<h1><?php getSellerName(1);?>'s Stores</h1>

    <form action="store-dashboard.php" method="get">
        <?php buttonsForStores(1);?>
    </form>
    <form action="create-store.php" method="get">
        <?php newStoreButton(1);?>
    </form>
    <form action="logout.php" method="get">
        <input type="submit" class="button" name="logout" value="Logout">
    </form>

</body>
</html>
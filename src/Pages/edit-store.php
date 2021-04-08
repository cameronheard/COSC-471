<?php
    session_start();
    $storeID = $_GET['storeID'];
    include '../includes/stores.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Submit"])) {
        $storeID = $_POST['storeID'];
        editStore($storeID);
        if (substr($storeID, 0, 5) === 'Error') {
            header("Location: ../Pages/create-store.php?error=true");
        } else {
            header("Location: ../Pages/store-dashboard.php?storeID=" . $storeID);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="eMarketDefault.css">
    <title>Edit Store</title>

</head>
    <body>
        <h1>Edit Store</h1>
        <form name='editStore' action='edit-store.php' method='post'>
            <?php populateStoreForm($storeID); ?>
        </form>
    </body>
</html>
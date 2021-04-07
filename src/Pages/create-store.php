<?php
    session_start();
    include '../includes/stores.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Submit"])) {
        $storeID = createStore(1);
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
    <title>Create Store</title>

</head>
<body>
    <h1>Create Store</h1>
    <?php if(isset($_GET['error']) &&$_GET['error'] == 'true'){
        echo('<h3>An error was encountered, please try again.</h3>');
    }?>
    <form name="createStore" action="create-store.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br>
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone"><br>
        <label for="logo">Insert Logo</label>
        <input type="file" id="logo" name="logo"><br>
        <label for="desc">Store Description</label>
        <textarea rows="4" cols="50" id="desc" name="desc"></textarea><br>
        <p>Address</p><br>
        <label for="street">Street Address</label>
        <input type="text" id="street" name="street"><br>
        <label for="apt">APT #</label>
        <input type="text" id="apt" name="apt">
        <label for="city">City</label>
        <input type="text" id="city" name="city"><br>
        <label for="state">State/Province</label>
        <input type="text" id="state" name="state"><br>
        <label for="country">Country</label>
        <input type="text" id="country" name="country"><br>
        <label for="zip">Postal Code</label>
        <input type="text" id="zip" name="zip"><br>
        <input type="submit" name= "Submit" value="Submit">
    </form>
</body>
</html>
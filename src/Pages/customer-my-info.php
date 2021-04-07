<?php
    session_start();
    include '../includes/customer.php';
    $customerID = $_SESSION["user"]["id"];      // Holds ID for current user logged in.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="eMarketDefault.css">
    <title><?php getCustomerName($customerID);?>'s Info</title>
</head>
<body>

<h1><?php getCustomerName($customerID);?>'s Info</h1>

<?php printCustomerInformation($customerID);?>

</body>
</html> 
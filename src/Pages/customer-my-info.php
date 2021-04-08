<?php
    session_start();
    include '../includes/customer.php';
    $customerID = $_SESSION["user"]["id"];      // Holds ID for current user logged in.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
			.body {
				background-color: rgba(253, 253, 253, 0.966);
				border-style: solid;
				width: 400px;
				height: 550px;
				text-align: center;
				position: fixed;
				top: 50%;
				left: 50%;
				margin-top: -300px;
				margin-left: -200px;
			}
			.header {
				background-color: rgba(253, 253, 253, 0.966);
			}

		</style>
    <title><?php getCustomerName($customerID);?>'s Info</title>
</head>
<body class="body">

<h1 class="header"><?php getCustomerName($customerID);?>'s Info</h1>

<?php printCustomerInformation($customerID);?>

</body>
</html> 
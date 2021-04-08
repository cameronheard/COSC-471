<?php
include("../includes/dbConnection.php");

session_start();

$quantity = $_GET['quantity'];
$customerID = $_GET['customerID'];
$productNum = $_GET['productNum'];
$orderID = $_GET['orderID'];

$sql = "SELECT * FROM Product WHERE ID='$productNum'";

$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<style>
			.body {
				background-color: rgba(253, 253, 253, 0.966);
				border-style: solid;
				width: 400px;
				height: 270px;
				text-align: center;
				position: fixed;
				top: 50%;
				left: 50%;
				margin-top: -135px;
				margin-left: -200px;
			}
			.header {
				background-color: rgba(253, 253, 253, 0.966);
			}

			.data-table {
				text-align: center;
				width: 400px;
			}

			.cell {
				border-style: groove;
			}
		</style>
	</head>
	<body class="body">
		<h2 class="header">My Order</h2>

		<table class="data-table">
			<tr>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
			<?php   
                while($row=mysqli_fetch_array($result))
                {
             ?>
            <tr>
                <td class="cell"><?php echo $row['Name'];?></td>
                <td class="cell"><?php echo $row['Price'];?></td>
                <td class="cell"><?php echo $quantity;?></td>
                <td class="cell"><?php echo ($quantity * $row['Price']);?></td>
                
            </tr>
            <?php
                }
             ?>

		</table>
		<p>

		<form method="get" action="deleteOrder.php">
    					<button type="submit" name="orderID" value="<?php echo $orderID?>" >Delete Order</button>
						
						</form>
		</p>
		</p>
		<p>
        <form method="get" action="Payment.php">
    					<button type="submit" name="customerID" value="<?php echo $customerID?>" >Pay</button>
						
						</form>
		</p>
	</body>
</html>
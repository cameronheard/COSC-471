
<!DOCTYPE html>

<?php
include("../includes/dbConnection.php");

session_start();

$totalCost = $_GET['totalCost'];
$customerID = $_GET['customerID'];
$productNum = $_GET['productNum'];

$sql = "SELECT * FROM product WHERE ID='$productNum'";

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
                <td class="cell"><?php echo ($totalCost / $row['Price']);?></td>
                <td class="cell"><?php echo $totalCost;?></td>
                
            </tr>
            <?php
                }
             ?>

		</table>
		<p>

			<button style="border-style: outset" type="button">Remove Product</button>
		</p>
		<p>
        <form method="get" action="http://localhost/COSC-471/src/pages/Payment.php">
						<input type="hidden" name="totalCost" value="<?php echo $totalCost?>"/>
    					<button type="submit" name="customerID" value="<?php echo $customerID?>" >Pay</button>
						
						</form>
		</p>
	</body>
</html>
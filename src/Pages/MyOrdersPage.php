
<!DOCTYPE html>

<?php
include("../includes/dbConnection.php");

session_start();

$customerID= '1';

$sql = "SELECT * FROM orders WHERE CustomerID='$customerID' ORDER BY Date ASC ";

$result = mysqli_query($conn, $sql);;

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
				height: 200px;
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
			.button {
				border-style: outset;
				width: 100px;
				height: 24px;
			}
		</style>
	</head>
	<body class="body">
		<h2 class="header">My Orders</h2>

		<table class="data-table">
			<tr>
				<th>Order ID</th>
				<th>Order Date</th>
				<th>Cost</th>
				<th></th>
			</tr>
			
			<?php   
                while($row=mysqli_fetch_array($result))
                {
             ?>
            <tr>
                <td class="cell"><?php echo $row['ID'];?></td>
                <td class="cell"><?php echo $row['Date'];?></td>
                <td class="cell"><?php echo $row['Cost'];?></td>
                <td>
					<form method="get" action="http://localhost/COSC-471/src/pages/MyOrder.php">
						<input type="hidden" name="productNum" value="<?php echo $row['ProductID']?>"/>
						<input type="hidden" name="customerID" value="<?php echo $customerID?>"/>
    					<button type="submit" name="totalCost" value="<?php echo $row['Cost']?>" >Info</button>
						
						</form>
				</td>
            </tr>
            <?php
                }
             ?>
			
			

		</table>
	</body>
</html>

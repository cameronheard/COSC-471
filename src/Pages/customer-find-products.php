<?php
include("../includes/dbConnection.php");

session_start();

$sql = "SELECT * FROM product ";

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
		<h2 class="header">Available Products</h2>

		<table class="data-table">
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Stock</th>
				<th></th>
			</tr>
			
			<?php   
                while($row=mysqli_fetch_array($result))
                {
             ?>
            <tr>
                <td class="cell"><?php echo $row['Name'];?></td>
                <td class="cell"><?php echo $row['Price'];?></td>
                <td class="cell"><?php echo $row['Stock'];?></td>
                <td>
					<form method="get" action="http://localhost/COSC-471/src/pages/customer-place-order.php">

    					<button type="submit" name="totalCost" value="<?php echo $row['ID']?>" >Info</button>
						
						</form>
				</td>
            </tr>
            <?php
                }
             ?>
		</table>
	</body>
</html>
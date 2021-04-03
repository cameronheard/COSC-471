
<!DOCTYPE html>

<?php
include("../includes/dbConnection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["Submit"])){


        if(!empty($_POST['CustomerID'])&& !empty($_POST['PaymentAmount'])&& !empty($_POST['PaymentType'])){
    
            $CustomerID = $_POST['CustomerID'];
            $PaymentAmount = $_POST['PaymentAmount'];
            $PaymentType = $_POST['PaymentType'];

            $query = "INSERT INTO Payment (`PaymentAmount`, `PaymentType`, `CustomerID`) VALUES('$PaymentAmount', '$PaymentType', '$CustomerID')";
                        mysqli_query($conn, $query);
                    }
                }

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

            .text-entry {
                border-style: inset;
            }

            .button {
                border-style: outset;
            }
            .dd_box{
                border-style: inset;
            }
        </style>
        <script language="javascript">

        </script>
    </head>
    <body class="body">
        <h2 class="header">Make a payment</h2>

    
                <form name="payment" method="post" action="payment.php">

                    <label style="margin-left: 25px;" for="CustomerID">Customer ID</label>
                    <input class="text-entry" type="text" name="CustomerID"><br><br>

                    <label style="margin-left: -4px;" for="PaymentAmount">Payment Amount</label>
                    <input class="text-entry" type="text" name="PaymentAmount"><br><br>

                    <label style="margin-left: -29px;" for="PaymentType">Payment Type</label>
	                <select class="dropbtn" name="PaymentType">
                        <option value>Select</option>
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                        <option value="Sacks of Potatoes">Sacks of Potatoes</option>
                        <option value="Live Squirrels">Live Squirrels</option>
	                </select><br><br>
	

                    <input type="Submit" name="Submit" value="Submit"></input>
                  </form>
          
        </body>
</html>


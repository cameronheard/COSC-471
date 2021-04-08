
<?php
include("../includes/dbConnection.php");

session_start();

$productID = $_GET["productID"];

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
        <h2 class="header">Enter Order Details</h2>
                <form name="payment" method="post" action="insertOrder.php">

                    

                    <label style="margin-left: -4px;" for="PaymentAmount">Quantity to purchase:</label>
                    <input class="text-entry" type="text" name="quantity"><br><br>

                    
                    <input type="hidden" name="productID" value="<?php echo $productID?>"/>
                    <input type="Submit" name="Submit" value="Submit"></input>
                  </form>
          
        </body>
</html>


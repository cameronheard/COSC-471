<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>STORE NAME's PRODUCTS</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>STORE_NAME's Products</h1>
    <table>
        <tr>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <tr>
            <!-- rows filled in by db query -->
        </tr>
    </table>
    <input type="button" onclick="alert('OPEN NEW PRODUCT PAGE')" value="New Product">
    <input type="button" onclick="alert('OPEN EDIT PRODUCT PAGE')" value="Edit Product">

</body>
</html>
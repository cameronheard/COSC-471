<?php
session_start();
require_once __DIR__ . "/../includes/database.php";

if ((!empty($orders = filter_input(INPUT_POST, "order", FILTER_FORCE_ARRAY))) && $_SESSION["user"]["type"] == "customer") {
    $db = connect_to_database();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $make_payment = $db->prepare("INSERT INTO Payment (Amount, PaymentType, CustomerID) VALUES ((:quantity * :price), :type, :customer_id);");
    $buy_product = $db->prepare("INSERT INTO Orders (Quantity, Date, CustomerID, ProductID, CourierID) VALUES (:quantity, CURRENT_DATE, :customer_id, :product_id, :courier_id)");
    $query_product = $db->prepare("SELECT Price FROM Product WHERE ID = :product_id;");

    $query_product->bindColumn("Price", $product_price);
    $query_product->bindParam(":product_id", $product_id, PDO::PARAM_INT);

    $make_payment->bindParam(":price", $product_price);
    $make_payment->bindParam(":quantity", $quantity);
    $make_payment->bindParam(":type", $payment_type);
    $make_payment->bindParam(":customer_id", $_SESSION["user"]["id"]);

    $buy_product->bindValue(":quantity", $product_price);
    $buy_product->bindParam(":customer_id", $_SESSION["user"]["id"], PDO::PARAM_INT);
    $buy_product->bindParam(":product_id", $product_id, PDO::PARAM_INT);
    $buy_product->bindParam(":courier_id", $courier_id);

    $db->beginTransaction();

    $product_id =& $order["product_id"];
    $quantity =& $order["quantity"];
    $payment_type =& $order["payment_type"];
    $courier_id =& $order["courier_id"];

    try {
        foreach ($orders as $order) {
            $query_product->execute();  // Get the price of the chosen product
            $query_product->fetch();  // Load the price into a variable

            $make_payment->execute();  // Record the payment in the Payments table
            $buy_product->execute();  // Record the order in the Orders table
        }
    } catch (PDOException $exception) {
        error_log($exception->errorInfo[2]);
        http_response_code(500);
    }
}

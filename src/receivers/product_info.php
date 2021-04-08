<?php

require_once __DIR__ . "/../includes/database.php";

if (isset($_GET["product_id"])) {
    header("Content-Type: application/json; charset=UTF-8");
    $db = connect_to_database();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $product_info = $db->prepare("SELECT P.ID as id, P.Name as product_name, Price as price, Stock as stock, S.Name as store FROM Product P LEFT JOIN Store S on S.ID = P.StoreID WHERE P.ID = :product_id LIMIT 1;");
        $product_info->bindParam(":product_id", $_GET["product_id"], PDO::PARAM_INT);
        $product_info->execute();

        $product = $product_info->fetch(PDO::FETCH_ASSOC);

        if (!empty($product)) {
            http_response_code(200);
            echo json_encode($product, JSON_FORCE_OBJECT | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG);
            exit(0);
        } else {
            http_response_code(404);
            die(1);
        }
    } catch (PDOException $exception) {
        error_log($exception->errorInfo[2]);
        http_response_code(500);
        die(1);
    }
}

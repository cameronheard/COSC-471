<?php

require_once __DIR__ . "/../includes/database.php";

if (isset($_GET["product_id"])) {
    header("Content-Type: application/json; charset=UTF-8");
    $db = connect_to_database();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $product_info = $db->prepare("SELECT P.Name, Price, Stock, S.Name as Store FROM Product P LEFT JOIN Store S on S.ID = P.StoreID WHERE P.ID = :product_id LIMIT 1;");
        $product_info->bindParam(":product_id", $_GET["product_id"], PDO::PARAM_INT);
        $product_info->execute();

        $product = $product_info->fetch(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode($product, JSON_FORCE_OBJECT | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG);
        exit;
    } catch (PDOException $exception) {
        error_log($db->errorInfo()[2]);
        http_response_code(500);
        die;
    }
}

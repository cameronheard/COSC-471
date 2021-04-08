<?php
require_once __DIR__ . "/../includes/database.php";

function display_products(string $name = null, int $page = 0) {
    $query = <<<SQL
SELECT P.id as id, P.name as name, price, stock, S.Name as store
FROM Product P LEFT JOIN Store S on S.ID = P.StoreID
WHERE P.Name LIKE CONCAT('%', :name, '%')
ORDER BY Name
LIMIT 20 OFFSET :page;
SQL;
    header("Content-Type: application/json; charset=UTF-8");

    $db = connect_to_database();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $search_products = $db->prepare($query);
        $search_products->bindParam(":name", $name);
        $search_products->bindValue(":page", $page * 20, PDO::PARAM_INT);
        $search_products->bindColumn("ID", $product_id, PDO::PARAM_INT);
        $search_products->bindColumn("Name", $product_name);
        $search_products->bindColumn("Price", $product_price);
        $search_products->bindColumn("Stock", $product_stock, PDO::PARAM_INT);
        $search_products->execute();

        $products = $search_products->fetchAll(PDO::FETCH_ASSOC);

        http_response_code(200);
        echo json_encode($products, JSON_FORCE_OBJECT | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_HEX_TAG);
        exit(0);
    } catch (PDOException $exception) {
        error_log($exception->errorInfo[2]);
        http_response_code(500);
        die(1);
    }
}

if (isset($_GET["name"]) || isset($_GET["page"])) display_products($_GET["name"] ?? null, $_GET["page"] ?? 0);

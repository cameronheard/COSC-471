<?php
require_once __DIR__ . "/../includes/database.php";

function display_products(string $name = null) {
    $query = empty($name) ? "SELECT ID, Name, Price, Stock FROM Product;" : "SELECT ID, Name, Price, Stock FROM Product WHERE Name LIKE CONCAT('%', :name, '%');";

    $db = connect_to_database();
    $search_products = $db->prepare($query);
    if (!empty($name)) $search_products->bindParam(":name", $name);
    $search_products->bindColumn("ID", $product_id, PDO::PARAM_INT);
    $search_products->bindColumn("Name", $product_name);
    $search_products->bindColumn("Price", $product_price);
    $search_products->bindColumn("Stock", $product_stock, PDO::PARAM_INT);
    $search_products->execute();
    ob_start()
    ?>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($search_products->fetch()): ?>
            <tr>
                <td class="product_name"><?= htmlspecialchars($product_name) ?></td>
                <td class="product_price">$<?= $product_price ?></td>
                <td class="product_stock"><?= $product_stock ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <?php
    return ob_get_clean();
}

if (isset($_GET["name"])) echo display_products($_GET["name"]);

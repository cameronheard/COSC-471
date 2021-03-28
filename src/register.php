<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = connect_to_database();

    $db->beginTransaction();
    header("Location: {$_SERVER['PHP_SELF']}/login");
}

require "templates/auth/register.php";

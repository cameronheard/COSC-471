<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
    } else {
        array_push($_SESSION["errors"], "Missing email/password!");
    }
    header("Location: {$_SERVER['PHP_SELF']}");
}

require __DIR__ . "/templates/auth/login.php";

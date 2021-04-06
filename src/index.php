<?php
session_start();
$_SESSION["errors"] = $_SESSION["errors"] ?? [];
$errors =& $_SESSION["errors"];
require __DIR__ . "/includes/database.php";
switch ($_SERVER["PATH_INFO"] ?? "/") {
    case "/my-info":
        break;
    case "/products":
        require "Pages/customer-find-products.php";
        break;
    case "/register":
        require "register.php";
        register();
        break;
    case "/login":
        require "login.php";
        login();
        break;
    case "/logout":
        session_unset();
        header("Location: {$_SERVER["SCRIPT_NAME"]}/login");
        exit;
}
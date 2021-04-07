<?php
session_start();
$_SESSION["errors"] = $_SESSION["errors"] ?? [];
$errors =& $_SESSION["errors"];
require __DIR__ . "/../includes/database.php";
switch ($_SERVER["PATH_INFO"] ?? "/") {
    case "/my-info":
        break;
    case "/products":
        require "customer-find-products.php";
        break;
    case "/dashboard":
        switch ($_SESSION["user"]["account_type"] ?? null) {
            case "customer":
                header("Location: {$_SERVER['SCRIPT_NAME']}/../customer-dashboard.php");
                break;
            case "seller":
                header("Location: {$_SERVER['SCRIPT_NAME']}/../seller-dashboard.php");
                break;
            default:
                header("Location: {$_SERVER['SCRIPT_NAME']}/login");
                exit;
        }
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
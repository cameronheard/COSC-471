<?php
session_start();
$_SESSION["errors"] = $_SESSION["errors"] ?? [];
$errors =& $_SESSION["errors"];
require __DIR__ . "/../includes/database.php";
switch ($_SERVER["PATH_INFO"] ?? null) {
    case "/my-info":
        if ($_SESSION["user"]["account_type"] == "customer") header("Location: {$_SERVER['SCRIPT_NAME']}/../customer-my-info.php");
        else header("Location: {$_SERVER['SCRIPT_NAME']}/dashboard");
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
    case "/create-store":
        if ($_SESSION["user"]["account_type"] == "seller") {
            header("Location: {$_SERVER['SCRIPT_NAME']}/../create-store.php");
            exit;
        } else {
            array_push($errors, "Access denied!");
            header("Location: {$_SERVER['SCRIPT_NAME']}/dashboard");
            die;
        }
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
    case "/":
    case null:
        header("Location: {$_SERVER['SCRIPT_NAME']}/dashboard");
        exit;
}
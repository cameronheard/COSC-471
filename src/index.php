<?php
session_start();
$_SESSION["errors"] = $_SESSION["errors"] ?? [];
$errors =& $_SESSION["errors"];
require __DIR__ . "/includes/database.php";
switch ($_SERVER["PATH_INFO"] ?? "/") {
    case "/register":
        require "register.php";
        break;
    case "/login":
        require "login.php";
        break;
}
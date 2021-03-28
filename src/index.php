<?php
session_start();
$_SESSION["errors"] ??= [];
switch ($_SERVER["PATH_INFO"] ?? "/") {
    case "/register":
        require "register.php";
        break;
    case "/login":
        require "login.php";
        break;
}
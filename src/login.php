<?php

use exceptions\ValidationException;

function login()
{
    global $errors;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST["login"];
        try {
            if (empty($login["email"])) throw new ValidationException();
            else $email = $login["email"];
            if (empty($login["password"])) throw new ValidationException();
            else $password = $login["password"];

            switch ($login["type"]) {
                case "customer":
                    $verify_user_exists_query = "SELECT COUNT(*) FROM Customer WHERE Email = :email;";
                    $retrieve_user_query = "SELECT ID, Password FROM Customer WHERE Email = :email LIMIT 1;";
                    break;
                case "seller":
                    $verify_user_exists_query = "SELECT COUNT(*) FROM Seller WHERE Email = :email;";
                    $retrieve_user_query = "SELECT ID, Password FROM Seller WHERE Email = :email LIMIT 1;";
                    break;
                default:
                    throw new ValidationException();
            }

            if (!empty($errors)) {
                // If any errors are present, terminate the script immediately, allowing the errors to be displayed and cleared.
                header("Location: " . $_SERVER["REQUEST_URI"]);
                die;
            }

            $db = connect_to_database();

            $query = $db->prepare($retrieve_user_query);
            $query->bindParam(":email", $email);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if (!empty($user)) {
                if (password_verify($password, $user["Password"])) {
                    $_SESSION["user"] = ["id" => $user["ID"], "account_type" => $login["type"]];
                }
            } else array_push($errors, "No user found!");

            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        } catch (ValidationException $exception) {
            if (empty(filter_var($login["email"], FILTER_VALIDATE_EMAIL))) array_push($errors, "Missing email!");
            if (empty($login["password"])) array_push($errors, "Missing password!");
            if (empty($login["type"])) array_push($errors, "No account type selected!");
            header("Location: {$_SERVER['REQUEST_URI']}");
            die;
        }
    }

    require __DIR__ . "/templates/auth/login.php";
}

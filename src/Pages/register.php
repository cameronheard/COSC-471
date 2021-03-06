<?php

use exceptions\ValidationException;

function register() {
    global $errors;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $register = $_POST["register"];
        try {
            if (empty($register["first_name"])) throw new ValidationException();
            else $first_name = trim($register['first_name']);
            if (empty($register["last_name"])) throw new ValidationException();
            else $last_name = $register['last_name'];
            if (empty(filter_var($register["email"], FILTER_VALIDATE_EMAIL))) throw new ValidationException();
            else $email = filter_var($register['email'], FILTER_SANITIZE_EMAIL);
            if (empty(filter_var($register["phone_number"], FILTER_VALIDATE_INT))) throw new ValidationException();
            else $phone_number = trim(filter_var($register['phone_number'], FILTER_SANITIZE_NUMBER_INT));
            if (empty($register["password"])) throw new ValidationException();
            elseif ($register["password"][0] != $register["password"][1]) throw new ValidationException();
            else $password = password_hash(trim($register['password'][0]), PASSWORD_DEFAULT);
            if (empty(trim($register["street"]))) throw new ValidationException();
            else $street = trim($register['street']);
            if (empty(trim($register["apartment_number"]))) $register["apartment_number"] = null;
            else $apartment_number = trim($register['apartment_number']);
            if (empty(trim($register["city"]))) throw new ValidationException();
            else $city = trim($register['city']);
            if (empty(trim($register["state"]))) throw new ValidationException();
            else $state = trim($register['state']);
            if (empty(trim($register["country"]))) throw new ValidationException();
            else $country = trim($register['country']);
            if (empty(filter_var(trim($register["zip"]), FILTER_VALIDATE_INT))) throw new ValidationException();
            else $zip = trim($register['zip']);

            switch ($register["type"]) {
                case "customer":
                    $create_user_query = "INSERT INTO Customer (Fname, Lname, Email, PhoneNo, Password, Street, Apt, City, State, Country, Zip) VALUES (:first_name, :last_name, :email, :phone_number, :password, :street, :apartment, :city, :state, :country, :zip)";
                    break;
                case "seller":
                    $create_user_query = "INSERT INTO Seller (Fname, Lname, Email, PhoneNo, Password, Street, Apt, City, State, Country, Zip) VALUES (:first_name, :last_name, :email, :phone_number, :password, :street, :apartment, :city, :state, :country, :zip)";
                    break;
                default:
                    throw new ValidationException();
            }

            if (!empty($errors)) {
                header("Location: {$_SERVER['REQUEST_URI']}");
                die;
            }

            $db = connect_to_database();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // If there are any errors, raise a PDOException

            $db->beginTransaction();

            $query = $db->prepare($create_user_query);
            $query->bindParam(":first_name", $first_name);
            $query->bindParam(":last_name", $last_name);
            $query->bindParam(":email", $email);
            $query->bindParam(":phone_number", $phone_number);
            $query->bindParam(":password", $password);
            $query->bindParam(":street", $street);
            $query->bindParam(":apartment", $apartment_number);
            $query->bindParam(":city", $city);
            $query->bindParam(":state", $state);
            $query->bindParam(":country", $country);
            $query->bindParam(":zip", $zip);

            try {
                $query->execute();
                $db->commit();
            } catch (PDOException $e) {
                $db->rollBack();
                array_push($errors, "Couldn't create account.");
                error_log($query->errorInfo()[2]);
            }

            header("Location: {$_SERVER['SCRIPT_NAME']}/login");
            exit;
        } catch (ValidationException $exception) {
            if (empty($register["first_name"])) array_push($errors, "Missing first name!");
            if (empty($register["last_name"])) array_push($errors, "Missing last name!");
            if (empty(filter_var($register["email"], FILTER_VALIDATE_EMAIL))) array_push($errors, "Missing email address!");
            if (empty(filter_var($register["phone_number"], FILTER_VALIDATE_INT))) array_push($errors, "Missing phone number!");
            if (empty($register["password"])) array_push($errors, "Missing password!");
            elseif ($register["password"][0] != $register["password"][1]) array_push($errors, "Password mismatch!");
            if (empty(trim($register["street"]))) array_push($errors, "Missing street!");
            if (empty(trim($register["city"]))) array_push($errors, "Missing city!");
            if (empty(trim($register["state"]))) array_push($errors, "Missing state/province!");
            if (empty(trim($register["country"]))) array_push($errors, "Missing country!");
            if (empty(filter_var(trim($register["zip"]), FILTER_VALIDATE_INT))) array_push($errors, "Missing zip/postal code!");
            if (!in_array($register["type"], ["customer", "seller"])) array_push($errors, "No account type selected!");
            header("Location: {$_SERVER['REQUEST_URI']}");
            die;
        }

    }
    require __DIR__ . "/../templates/auth/register.php";
}

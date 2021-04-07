<?php
/**
 * @return PDO A new PDO connected to the project database
 * @throws PDOException If the attempt to connect to the database fails
 */
function connect_to_database(): PDO
{
    $username = isset($_ENV["MYSQL_USER_FILE"]) ? file_get_contents($_ENV["MYSQL_USER_FILE"]) : $_ENV["MYSQL_USER"] ?? "root";
    $password = isset($_ENV["MYSQL_PASSWORD_FILE"]) ? file_get_contents($_ENV["MYSQL_PASSWORD_FILE"]) : $_ENV["MYSQL_PASSWORD"] ?? null;
    $dbHost = $_ENV['DB_HOST'] ?? 'localhost';
    $dbName = $_ENV['DB_NAME'] ?? 'eMarket';
    $dbPort = $_ENV['DB_PORT'] ?? 3306;
    try {
        return new PDO("mysql:host=$dbHost;dbname=$dbName;port=$dbPort",
            $username,
            $password,
            [PDO::ATTR_PERSISTENT => true]);
    } catch (PDOException $e) {
        die("Error!: {$e->getMessage()}<br/>");
    }
}

/**
 * @param $connection PDO The connection to close
 */
function close_database_connection(PDO &$connection)
{
    $connection = null;
}
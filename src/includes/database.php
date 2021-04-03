<?php
/**
 * @return PDO A new PDO connected to the project database
 * @throws PDOException If the attempt to connect to the database fails
 */
function connect_to_database(): PDO
{
    $username = isset($_ENV["MYSQL_USERNAME_FILE"]) ? file_get_contents($_ENV["MYSQL_USERNAME_FILE"]) : $_ENV["MYSQL_USERNAME"] ?? "root";
    $password = isset($_ENV["MYSQL_PASSWORD_FILE"]) ? file_get_contents($_ENV["MYSQL_PASSWORD_FILE"]) : $_ENV["MYSQL_PASSWORD"];
    return new PDO("mysql:host={${$_ENV['DB_HOST'] ?? 'localhost'}};dbname={${$_ENV['DB_NAME'] ?? 'eMarket'}};port={${$_ENV['DB_PORT'] ?? 3306}}",
    $username,
    $password,
    [PDO::ATTR_PERSISTENT => true]);
}

/**
 * @param $connection PDO The connection to close
 */
function close_database_connection(PDO &$connection)
{
    $connection = null;
}
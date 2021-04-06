<?php
/**
 * The address of the MySQL server. If not set, the connector will default to "localhost"
 */
$dbHost = $_ENV["DB_HOST"] ?? null;

/**
 * The current MySQL user, defaulting to "root"
 */
$dbUser = isset($_ENV["MYSQL_USER_FILE"]) ? file_get_contents($_ENV["MYSQL_USER_FILE"]) : $_ENV["MYSQL_USER"] ?? "root";

/**
 * The current MySQL user's password.
 * If this environment variable isn't set, the connector will authenticate against users without a password
 * (such as the root user, if you hadn't set a password for it)
 */
$dbPass = isset($_ENV["MYSQL_PASSWORD_FILE"]) ? file_get_contents($_ENV["MYSQL_PASSWORD_FILE"]) : $_ENV["MYSQL_PASSWORD"] ?? null;

/**
 * The name of the database to connect to
 */
$db = $_ENV["MYSQL_DATABASE"] ?? "eMarket";

/**
 * The port number of the MySQL server.
 */
$dbPort = $_ENV["DB_PORT"] ?? null;

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db, $dbPort);

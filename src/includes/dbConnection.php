<?php
/**
 * The address of the MySQL server. If not set, the connector will default to "localhost"
 */
$dbHost = $_ENV["DB_HOST"];

/**
 * The current MySQL user, defaulting to "root"
 */
$dbUser = $_ENV["MYSQL_USERNAME"] ?? "root";

/**
 * The current MySQL user's password.
 * If this environment variable isn't set, the connector will authenticate against users without a password
 * (such as the root user, if you hadn't set a password for it)
 */
$dbPass = $_ENV["MYSQL_PASSWORD"];

/**
 * The name of the database to connect to
 */
$db = "eMarket";

/**
 * The port number of the MySQL server.
 */
$dbPort = $_ENV["DB_PORT"];

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db, $dbPort);

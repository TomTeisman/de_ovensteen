<?php
define("DB_SERVER", "");    // Server address
define("DB_USERNAME", "");  // Username for the database
define("DB_PASSWORD", "");  // Password for the database
define("DB_NAME", "");      // Name of the database
define("ROOT_PATH", "");    // Path to the project's root

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e);
}

<?php
/**
 * The server ip where the database lives
 */
define("DB_SERVER", "");

/**
 * The username for the database
 */
define("DB_USERNAME", "");

/**
 * The password for the database
 */
define("DB_PASSWORD", "");

/**
 * The name of the database
 */
define("DB_NAME", "");

/**
 * The path to the root of this project
 */
define("ROOT_PATH", "");

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e);
}

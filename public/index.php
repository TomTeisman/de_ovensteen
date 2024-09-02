<?php
/*
|--------------------------------------------------------------------------
| Include The Configuration File
|--------------------------------------------------------------------------
|
| Include the configuration file to make sure connection to the database
| will be possible globally and files will go into the right folder.
|
*/
require __DIR__ . "/../config.php";

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/
require __DIR__ . "/../vendor/autoload.php";

// Include the router logic
require __DIR__ . "/../app/Routes/router.php";

// Include the routes definition
require_once __DIR__ . "/../app/Routes/web.php";

use App\Route;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$method = $_SERVER["REQUEST_METHOD"];

// Remove the base directory from the URL
$baseDir = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
$url = '/' . trim(str_replace($baseDir, '', $url), '/');

Route::handle_request($url, $method);
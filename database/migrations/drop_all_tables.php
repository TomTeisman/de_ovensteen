<?php
echo "\033[44m INFO \033[0m dropping database.\n\n";
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
    $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DROP DATABASE " . DB_NAME . ";
            CREATE DATABASE " . DB_NAME . ";";

    $con->exec($sql);
} catch (PDOException $e) {
    echo basename(__FILE__);
    echo " .................. \033[1;31mERROR\033[0m\n\n";
    echo $sql . "\n" . $e->getMessage() . "\n\n";
    $con = null;
    return;
}

$con = null;

echo basename(__FILE__);
echo " .................. \033[1;32mDONE\033[0m\n\n";

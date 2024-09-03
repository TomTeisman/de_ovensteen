<?php
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
  $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
  DROP TABLE IF EXISTS `products`;
  CREATE TABLE IF NOT EXISTS `products` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(80) NOT NULL,
    `categorie_id` int NOT NULL,
    `description` text NOT NULL,
    `price` double NOT NULL,
    PRIMARY KEY (`id`),
    KEY `categorie_id` (`categorie_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;";

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

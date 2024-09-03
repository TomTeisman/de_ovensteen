<?php
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
  $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "
  DROP TABLE IF EXISTS `orderrows`;
  CREATE TABLE IF NOT EXISTS `orderrows` (
    `id` int NOT NULL AUTO_INCREMENT,
    `order_id` int NOT NULL,
    `state_id` int NOT NULL,
    `product_id` int NOT NULL,
    `quantity` int NOT NULL,
    `price` double NOT NULL,
    PRIMARY KEY (`id`),
    KEY `order_id` (`order_id`),
    KEY `state_id` (`state_id`),
    KEY `product_id` (`product_id`)
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

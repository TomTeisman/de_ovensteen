<?php
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
    $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        --
        -- Constraints for table `orderrows`
        --
        ALTER TABLE `orderrows`
            ADD CONSTRAINT `orderrows_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
            ADD CONSTRAINT `orderrows_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `orderrow_states` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

        --
        -- Constraints for table `orders`
        --
        ALTER TABLE `orders`
            ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `order_states` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
            ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id`) REFERENCES `orderrows` (`order_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

        --
        -- Constraints for table `products`
        --
        ALTER TABLE `products`
            ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

        --
        -- Constraints for table `roles`
        --
        ALTER TABLE `users`
          ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
        COMMIT;
    ";

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

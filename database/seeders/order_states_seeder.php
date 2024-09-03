<?php
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
    $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        --
        -- Inserts data into table `order_states`
        --
    
        INSERT INTO `order_states` (`name`, `slug`) VALUES
        ('Initieel', 'initial'),
        ('Word bereid', 'baking'),
        ('Verzonden', 'send'),
        ('Afgeleverd', 'delivered'),
        ('Afgerond', 'finished');
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

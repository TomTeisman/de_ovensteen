<?php
echo basename(__FILE__);
echo " .................. \033[1;33mRUNNING\033[0m\n";

try {
    $con = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "
        --
        -- Inserts data into table `products`
        --
    
        INSERT INTO `products` (`name`, `categorie_id`, `description`, `price`) VALUES
        ('Pizza Margherita', 1, 'Tomaat en kaas', 9.00),
        ('Pizza Funghi', 1, 'Tomaat, kaas en champignons', 10.00),
        ('Pizza Boromea', 1, 'Tomaat, kaas en ham', 10.50),
        ('Pizza Salami', 1, 'Tomaat, kaas en salami', 10.50),
        ('Pizza Peperoni', 1, 'Tomaat, kaas en pepperoni', 10.50),
        ('Pizza Cipolla', 1, 'Tomaat, kaas en ui', 10.00),
        
        ('Pizza Calzone Shoarma', 2, 'Dubbelgevouwen pizza met tomaat, kaas en shoarma', 12.50),
        ('Pizza Calzone Dönner', 2, 'Dubbelgevouwen pizza met tomaat, kaas en dönner', 12.50),
        ('Pizza Calzone Kipfilet', 2, 'Dubbelgevouwen pizza met tomaat, kaas, kipfilet, paprika en ui', 13.00),
        
        ('Turkse Pizza met groente', 3, 'Dun platbrood met gekruid gehakt, groenten en kruiden', 8.50),
        ('Turkse Pizza met kaas en groente', 3, 'Dun platbrood met gekruid gehakt, kaas, groenten en kruiden', 9.00),
        ('Turkse Pizza met kaas, dönner en groente', 3, 'Dun platbrood met gekruid gehakt, kaas, dönner, groenten en kruiden', 10.00),
        ('Turkse Pizza met kaas, kipdönner en groente', 3, 'Dun platbrood met gekruid gehakt, kaas, kipdönner, groenten en kruiden', 10.00),

        ('Kapsalon Döner', 4, 'Frietjes, döner vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 10.00),
        ('Kapsalon Döner XL', 4, 'Frietjes, döner vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 11.50),
        ('Kapsalon Kipdöner', 4, 'Frietjes, kipdöner vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 10.00),
        ('Kapsalon Kipdöner XL', 4, 'Frietjes, kipdöner vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 11.50),
        ('Kapsalon Shoarma', 4, 'Frietjes, shoarma vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 10.00),
        ('Kapsalon Shoarma XL', 4, 'Frietjes, shoarma vlees, kaas, sla, tomaat, komkommer, knoflooksaus, yoghurtsaus', 11.50);
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

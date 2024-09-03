<?php
echo "\n\033[44m INFO \033[0m Seeding database.\n\n";

include "./database/seeders/roles_table_seeder.php";
include "./database/seeders/users_table_seeder.php";
include "./database/seeders/categories_table_seeder.php";
include "./database/seeders/products_table_seeder.php";
include "./database/seeders/orderrow_states_seeder.php";
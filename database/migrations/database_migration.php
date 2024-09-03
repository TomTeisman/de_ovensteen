<?php
echo "\033[44m INFO \033[0m migrating database.\n\n";

/* -- create tables -- */
include "./database/migrations/create_roles_table.php";
include "./database/migrations/create_users_table.php";
include "./database/migrations/create_categories_table.php";
include "./database/migrations/create_products_table.php";
include "./database/migrations/create_order_states_table.php";
include "./database/migrations/create_orders_table.php";
include "./database/migrations/create_orderrow_states_table.php";
include "./database/migrations/create_orderrows_table.php";

echo "\033[44m INFO \033[0m establishing relations.\n\n";

/* -- create relations -- */
include "./database/migrations/create_constraints.php";
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <form action="<?php echo "/categories/" . $category['id'] . "/delete" ?>" method="post">
        <p><?php echo $category['name'] ?></p>
        <button onclick="location.href='<?php echo"/categories/$category[id]/edit" ?>'" type="button">Aanpassen</button>
        <button type="submit">Verwijder</button>
    </form>

    <div>
        <?php
            foreach ($products as $product) {
                echo "<p>$product[name]</p>";
            }
        ?>
    </div>
</body>
</html>
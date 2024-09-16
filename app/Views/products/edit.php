<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <form action="<?php echo "/products/" . $product["id"] ?>" method="post">
        <label for="name">name</label></br>
        <input id="name" name="name" placeholder="<?php echo htmlspecialchars($product['name']) ?>" />
        </br>
        </br>

        <label for="category">category</label></br>
        <select id="category" name="category">
            <?php
            foreach ($categories as $category) {
                if ($product['categorie_id'] === $category['id']) {
                    echo "<option value=\"$category[id]\" selected>$category[name]</option>";
                } else {
                    echo "<option value=\"$category[id]\">$category[name]</option>";
                }
            }
            ?>
        </select>
        </br>
        </br>

        <label for="description">description</label></br>
        <textarea id="description" name="description" placeholder="<?php echo $product['description'] ?>"></textarea>
        </br>
        </br>

        <label for="price">price</label></br>
        <input id="price" name="price" placeholder="<?php echo number_format($product['price'], 2, ',') ?>"/>
        </br>
        </br>
        
        <button type="submit">Verzenden</button>
    </form>
</body>

</html>
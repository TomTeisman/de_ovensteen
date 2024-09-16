<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
</head>
<body>
    <form action="<?php echo "/products/" . $product['id'] . "/delete" ?>" method="post">
        <p><?php echo $product['name'] ?></p>
        <p><a href="<?php echo"/categories/$category[id]" ?>"><?php echo $category['name'] ?></a></p>
        <p><?php echo $product['description'] ?></p>
        <p>€ <?php echo number_format($product['price'], 2, ',')?></p>
        <button onclick="location.href='<?php echo"/products/$product[id]/edit" ?>'" type="button">Aanpassen</button>
        <button type="submit">Verwijder</button>
    </form>
</body>
</html>
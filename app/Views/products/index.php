<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?php 
        foreach ($products as $product) {
            echo "<a href='/products/$product[id]'>$product[name]</a></br>";
        }
    ?>
    </br>
    <button onclick="location.href='/create/products'">Niew product</button>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        foreach ($categories as $category) {
            echo "<a href='/categories/$category[id]'>$category[name]</a></br>";
        }
    ?>
    </br>
    <button onclick="location.href='/create/categories'">Niewe categorie</button>
</body>
</html>
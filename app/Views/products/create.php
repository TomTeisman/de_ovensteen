<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <form action="/products" method="post">
        <label for="name">name</label>
        </br>
        <input name="name" id="name">
        </br>
        </br>
        
        <label for="category">category</label>
        </br>
        <select name="category" id="category">
            <?php
            foreach ($categories as $category) {
                echo "<option value=\"$category[id]\">$category[name]</option>";
            }
            ?>
        </select>
        </br>
        </br>

        <label for="description">description</label>
        </br>
        <textarea name="description" id="description"></textarea>
        </br>
        </br>

        <label for="price">price</label>
        </br>
        <input type="number" step="0.01" min="0" name="price" id="price">
        </br>
        </br>

        <button type="submit">Verzenden</button>
    </form>
</body>

</html>
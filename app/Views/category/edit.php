<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="<?php echo "/categories/" . $category["id"]?>" method="post">
        <label for="name">name</label>
        <input id="name" name="name" placeholder="<?php echo htmlspecialchars($category['name'])?>"/>
        <label for="slug">slug</label>
        <input id="slug" name="slug" placeholder="<?php echo htmlspecialchars($category['slug'])?>"/>
        <button type="submit">Verzenden</button>
    </form>
</body>
</html>
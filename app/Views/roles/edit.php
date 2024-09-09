<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="<?php echo "/roles/" . $role["id"]?>" method="post">
        <label for="name">name</label>
        <input id="name" name="name" placeholder="<?php echo htmlspecialchars($role['name'])?>"/>
        <button type="submit">Verzenden</button>
    </form>
</body>
</html>
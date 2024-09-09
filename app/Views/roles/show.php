<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <form action="<?php echo "/roles/" . $role['id'] . "/delete" ?>" method="post">
        <p><?php echo $role['name'] ?></p>
        <button onclick="location.href='<?php echo"/roles/$role[id]/edit" ?>'" type="button">Aanpassen</button>
        <button type="submit">Verwijder</button>
    </form>
</body>
</html>
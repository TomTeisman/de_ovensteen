<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach ($roles as $role) {
            echo "<a href='/roles/$role[id]'>$role[name]</a></br>";
        }
    ?>
    </br>
    <button onclick="location.href='/create/roles'">Niewe rol</button>
</body>
</html>
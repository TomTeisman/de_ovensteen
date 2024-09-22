<?php

namespace App\Controllers\Middleware;

class Role
{
    public static function handle(...$roles)
    {
        $roles = $roles[0];
        echo "These are the roles allowed:</br>";
        foreach ($roles as $role) {
            echo $role . "</br>";
        }
        echo "</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
    }
}
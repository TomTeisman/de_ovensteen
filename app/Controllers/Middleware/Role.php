<?php

namespace App\Controllers\Middleware;

class Role
{
    public static function handle(...$roles)
    {
        // Check if the user is authorised
        echo "check if the user has one of the following roles: </br>";

        foreach ($roles[0] as $role) {
            echo $role . "</br>";
        }
    }
}
<?php

namespace App\Controllers\Middleware;

class Role
{
    public static function handle()
    {
        echo "Check if the user is authorised with the correct role<br>";
        exit;
    }
}
<?php

namespace App\Controllers;

use App\Interfaces\Controller;
use App\Models\Role;

class RoleController implements Controller 
{
    public static function index()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            echo "$role[name]</br>";
        }
    }

    public static function show($id)
    {
        $role = Role::find($id);
        echo $role['name'];
    }

    public static function create()
    {
        //   
    }

    public static function store()
    {
        //   
    }

    public static function edit($id)
    {
        //   
    }

    public static function update($id)
    {
        //   
    }

    public static function destroy($id)
    {
        //   
    }
}
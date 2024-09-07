<?php

namespace App\Controllers;

use App\Interfaces\Controller;
use App\Traits\ControllerTraits;
use App\Models\Role;

class RoleController implements Controller 
{
    use ControllerTraits;
    
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
        return (new self)->view("roles.create");
    }

    public static function store()
    {
        $role = new Role($_POST['name']); // add security features and validation!!!
        $role->save();
        return (new self)->redirect('role.index');
    }

    public static function edit($id)
    {
        $role = Role::find($id);
        echo $role['name'];
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
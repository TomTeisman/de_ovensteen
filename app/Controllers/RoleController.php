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
        return (new self)->view('roles.index', ['roles' => $roles]);
    }

    public static function show($id)
    {
        $role = Role::find($id);
        return (new self)->view('roles.show', ['role' => $role]);
    }

    public static function create()
    {
        return (new self)->view("roles.create");
    }

    public static function store()
    {        
        $validateData = (new self)->validate([
            'name' => "required|string|max:40",
        ]);

        $role = new Role($validateData['name']);
        $role->save();
        return (new self)->redirect('role.index');
    }

    public static function edit($id)
    {
        $role = Role::find($id);
        return (new self)->view('roles.edit', ['role' => $role]);
    }

    public static function update($id)
    {
        $validateData = (new self)->validate([
            'name' => "required|string|max:40"
        ]);
        
        $role = new Role($validateData['name']);
        $role->update($id);
        return (new self)->redirect('role.index');
    }

    public static function destroy($id)
    {
        Role::delete($id);
        return (new self)->redirect('role.index');
    }
}
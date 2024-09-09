<?php

namespace App\Controllers;

use App\Interfaces\Controller;
use App\Models\Category;
use App\Traits\ControllerTraits;

class CategoryController implements Controller
{
    use ControllerTraits;

    public static function index()
    {
        $categories = Category::all();
        return (new self)->view('category.index', ['categories' => $categories]);
    }

    public static function show($id)
    {
        $category = Category::find($id);
        return (new self)->view('category.show', ['category' => $category]);
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
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
        return (new self)->view('category.create');
    }
    
    public static function store()
    {
        $validatedData = (new self)->validate([
            'name' => "required|string|max:40",
            'slug' => "required|string|max:100"
        ]);

        $category = new Category($validatedData["name"], $validatedData["slug"]);
        $category->save();
        return (new self)->redirect('category.index');
    }

    public static function edit($id)
    {
        $category = Category::find($id);
        return (new self)->view('category.edit', ['category' => $category]);
    }

    public static function update($id)
    {
        $validatedData = (new self)->validate([
            'name' => "required|string|max:40",
            'slug' => "required|string|max:100"
        ]);

        $category = new Category($validatedData['name'], $validatedData['slug']);
        $category->update($id);
        return (new self)->redirect('category.show', ['id' => $id]);
    }

    public static function destroy($id)
    {
        Category::delete($id);
        return (new self)->redirect('category.index');
    }
}
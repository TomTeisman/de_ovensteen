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
        $category = new Category($_POST['name'], $_POST['slug']); // add security features and validation!!!
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
        $category = new Category($_POST['name'], $_POST['slug']); // add security features and validation!!!
        $category->update($id);
        return (new self)->redirect('category.show', ['id' => $id]);
    }

    public static function destroy($id)
    {
        Category::delete($id);
        return (new self)->redirect('category.index');
    }
}
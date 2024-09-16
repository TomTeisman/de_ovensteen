<?php

namespace App\Controllers;

use App\Interfaces\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ControllerTraits;

class ProductController implements Controller
{
    use ControllerTraits;

    public static function index()
    {
        $products = Product::all();
        return (new self)->view('products.index', ['products' => $products]);
    }

    public static function show($id)
    {
        $product = Product::find($id);
        $category = Product::category($product['categorie_id']);
        return (new self)->view('products.show', ['product' => $product, 'category' => $category]);
    }

    public static function create()
    {
        $categories = Category::all();
        return (new self)->view('products.create', ['categories' => $categories]);
    }

    public static function store()
    {
        $validatedData = (new self)->validate([
            "name" => "required|string|max:80",
            "category" => "required|integer",
            "description" => "required|string",
            "price" => "required|numeric"
        ]);

        $product = new Product($validatedData['name'], $validatedData['category'], $validatedData["description"], $validatedData["price"]);
        $product->save();
        return (new self)->redirect('product.index');
    }

    public static function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return (new self)->view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public static function update($id)
    {
        $validatedData = (new self)->validate([
            'name' => "required|string|max:80",
            'category' => "required",
            'description' => "required|string",
            'price' => "required|numeric"
        ]);

        $product = new Product($validatedData["name"], $validatedData["category"], $validatedData["description"], $validatedData["price"]);
        $product->update($id);
        return (new self)->redirect('product.show', ['id' => $id]);
    }

    public static function destroy($id)
    {
        Product::delete($id);
        return (new self)->redirect('products.index');
    }
}
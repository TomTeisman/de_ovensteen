<?php

namespace App\Controllers;

use App\Interfaces\Controller;
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
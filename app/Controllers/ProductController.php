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
        die(print_r($products));
    }

    public static function show($id)
    {
        //
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
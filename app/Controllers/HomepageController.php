<?php

namespace App\Controllers;

use App\Interfaces\Controller;

class HomepageController implements Controller 
{
    public static function index()
    {
        echo "test";
    }

    public static function show($id)
    {
        echo "test with product: " . $id;
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
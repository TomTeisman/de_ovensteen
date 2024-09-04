<?php

use App\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| Provide the URL and the controller method to register the route.
|
*/

Route::get("/", "HomepageController@index");
Route::get("/{id}", "HomepageController@show");

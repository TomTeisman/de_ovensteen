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

/* - homepage routes - */
Route::get("/", "HomepageController@index");

/* - role routes - */
Route::get("/roles", "RoleController@index");
Route::get("/roles/{id}", "RoleController@show");
Route::get("/create/roles", "RoleController@create");
Route::post("/roles", "RoleController@store");
Route::get("/roles/{id}/edit", "RoleController@edit");
Route::post("/roles/{id}", "RoleController@update");

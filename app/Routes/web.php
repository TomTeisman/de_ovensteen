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

/* - role routes - */
Route::get("/roles", "RoleController@index");
Route::get("/roles/{id}", "RoleController@show");
Route::get("/create/roles", "RoleController@create");
Route::post("/roles", "RoleController@store");
Route::get("/roles/{id}/edit", "RoleController@edit");
Route::post("/roles/{id}", "RoleController@update");
Route::post("/roles/{id}/delete", "RoleController@destroy");

/* - category routes - */
Route::get("/categories", "CategoryController@index");
Route::get("/categories/{id}", "CategoryController@show");
Route::get("/create/categories", "CategoryController@create");
Route::post("/categories", "CategoryController@store");
Route::get("/categories/{id}/edit", "CategoryController@edit");
Route::post("/categories/{id}", "CategoryController@update");
Route::post("/categories/{id}/delete", "CategoryController@destroy");
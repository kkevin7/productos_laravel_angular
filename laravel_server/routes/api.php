<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/producto', 'ApiProducto@create');
Route::get('/producto', 'ApiProducto@findAll');
Route::get('/producto/{id}', 'ApiProducto@findById');
Route::put('/producto/{id}', 'ApiProducto@update');
Route::delete('/producto/{id}', 'ApiProducto@delete');
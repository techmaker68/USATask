<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/register', 'registercontroller@Register');
Route::post('/login', 'registercontroller@login');


// category Crud Apis
Route::post('category/create', 'CategoryController@Register');
Route::post('category/update/{id}', 'CategoryController@update');
Route::delete('category/delete/{id}', 'CategoryController@destroy');

//Brand crud Apis
Route::post('brand/create', 'BrandController@Register');
Route::post('brand/update/{id}', 'BrandController@update');
Route::delete('brand/delete/{id}', 'BrandController@destroy');

//Product crud Apis
Route::get('products', 'ProductController@index');
Route::post('product/create', 'ProductController@Register');
Route::post('product/update/{id}', 'ProductController@update');
Route::delete('product/delete/{id}', 'ProductController@destroy');

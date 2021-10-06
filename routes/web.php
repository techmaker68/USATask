<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create','pagescontroller@create');
Route::get('show','registercontroller@index');
route::post('show','registercontroller@show');
route::post('delete','registercontroller@destroy');
route::get('edit','registercontroller@editshow');



//Route::get('edit','pagescontroller@edit');
Route::get('delete','pagescontroller@delete');
Route::post('create','registercontroller@store');
Route::post('delete','registercontroller@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

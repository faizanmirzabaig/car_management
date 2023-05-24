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

Route::post('/register', 'ApiController@register_store')->name('user.login.register');
// manufacturer start here
Route::POST('/add/catagory', 'ApiController@store')->name('categories.add');
Route::POST('/update/{id}', 'ApiController@update')->name('categories.update');
// manufacturer end here

// car model start here
Route::post('/store', 'CarModelController@store')->name('carmodels.store');

Route::post('/car_model/update/{id}', 'CarModelController@update')->name('carmodels.update');


// car model end here

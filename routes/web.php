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
Route::post('/user/store', 'UserController@user_store')->name('user.login.store');

Route::middleware(['guard'])->group(function () {
    
    Route::get('/', 'UserController@login')->name('user.login');
    Route::get('/register', 'UserController@register')->name('user.register');
    Route::get('/logout', 'UserController@logout')->name('user.logout');


    Route::prefix('/manage-models')->group(function () {
        Route::get('/index', 'CarModelController@index')->name('carmodels.index');
        Route::get('/create', 'CarModelController@create')->name('carmodels.create');
        Route::get('/edit/{id}', 'CarModelController@edit')->name('carmodels.edit');
        // Route::post('/update/{slug}', 'CarModelController@update')->name('carmodels.update');
        Route::post('/delete', 'CarModelController@delete')->name('carmodels.delete');
    });
    Route::prefix('/manage-manufactures')->group(function () {
        Route::GET('/index', 'ManufacturerController@index')->name('categories.all');
        Route::GET('/add', 'ManufacturerController@create')->name('categories.create');
        Route::GET('/edit/{id}', 'ManufacturerController@edit')->name('categories.edit');
        Route::post('/delete', 'ManufacturerController@delete')->name('categories.delete');
        // Route::POST('/get/catagory', 'CategoryController@getCategory');
    });
});

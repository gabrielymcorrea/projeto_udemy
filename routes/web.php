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
    return view('/auth/login');
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->group(function(){
        Route::get('restaurantes','Admin\RestauranteController@index')->name('restaurantes.index');
        Route::get('restaurantes/new','Admin\RestauranteController@new')->name('restaurantes.new');
        Route::post('restaurantes/store', 'Admin\RestauranteController@store')->name('restaurantes.store');
        Route::get('restaurantes/edit/{restaurante}','Admin\RestauranteController@edit')->name('restaurantes.edit');
        Route::post('restaurantes/update/{id}','Admin\RestauranteController@update')->name('restaurantes.update');
        Route::get('restaurantes/remove/{id}','Admin\RestauranteController@delete')->name('restaurantes.remove');
    });
});




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

<?php

use Illuminate\Support\Facades\Auth;
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
    return view('/welcome');
});

Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->namespace('Admin')->group(function(){

        route::prefix('restaurantes')->group(function(){
            Route::get('/','RestauranteController@index')->name('restaurantes.index');
            Route::get('new','RestauranteController@new')->name('restaurantes.new');
            Route::post('store', 'RestauranteController@store')->name('restaurantes.store');
            Route::get('edit/{restaurante}','RestauranteController@edit')->name('restaurantes.edit');
            Route::post('update/{id}','RestauranteController@update')->name('restaurantes.update');
            Route::get('remove/{id}','RestauranteController@delete')->name('restaurantes.remove');
        });
        
        route::prefix('users')->group(function(){
            Route::get('/','UserController@index')->name('user.index');
            Route::get('new','UserController@new')->name('user.new');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{user}','UserController@edit')->name('user.edit');
            Route::post('update/{id}','UserController@update')->name('user.update');
            Route::get('remove/{id}','UserController@delete')->name('user.remove');
        });
    });
});


//Auth::routes();


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

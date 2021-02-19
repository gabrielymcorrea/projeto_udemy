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



Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->namespace('Admin')->group(function(){

        route::prefix('restaurantes')->group(function(){
            Route::get('/','RestauranteController@index')->name('restaurantes.index');
            Route::get('new','RestauranteController@new')->name('restaurantes.new');
            Route::post('store', 'RestauranteController@store')->name('restaurantes.store');
            Route::get('edit/{restaurante}','RestauranteController@edit')->name('restaurantes.edit');
            Route::post('update/{id}','RestauranteController@update')->name('restaurantes.update');
            Route::get('remove/{id}','RestauranteController@delete')->name('restaurantes.remove');

            Route::get('/photos/{id}','RestaurantePhotoController@index')->name('restaurantes.photo');
            Route::post('/photos/{id}','RestaurantePhotoController@save')->name('restaurantes.photo.save');
        });
        
        route::prefix('users')->group(function(){
            Route::get('/','UserController@index')->name('user.index');
            Route::get('new','UserController@new')->name('user.new');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{user}','UserController@edit')->name('user.edit');
            Route::post('update/{id}','UserController@update')->name('user.update');
            Route::get('remove/{id}','UserController@delete')->name('user.remove');
        });

        route::prefix('menus')->group(function(){
            Route::get('/','MenuController@index')->name('menu.index');
            Route::get('new','MenuController@new')->name('menu.new');
            Route::post('store', 'MenuController@store')->name('menu.store');
            Route::get('edit/{menu}','MenuController@edit')->name('menu.edit');
            Route::post('update/{id}','MenuController@update')->name('menu.update');
            Route::get('remove/{id}','MenuController@delete')->name('menu.remove');
        });

    });
});


//Auth::routes();
Route::get('/','HomeController@index')->name('home')->middleware('auth');
Route::get('/restaurant/{id}', 'HomeController@get')->name('home.single');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



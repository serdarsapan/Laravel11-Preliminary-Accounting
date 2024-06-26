<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', '\App\Http\Controllers\HomeController@index');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'prefix'=>'admin'], function () {

    Route::get('/', '\App\Http\Controllers\Admin\DashboardController@index');

    //Cari
    Route::get('/cari', '\App\Http\Controllers\Admin\CariController@index')->name('cari.index');
    Route::get('/cari/create', '\App\Http\Controllers\Admin\CariController@create')->name('cari.create');
    Route::post('/cari', '\App\Http\Controllers\Admin\CariController@store')->name('cari.store');
    Route::get('/cari/{id}', '\App\Http\Controllers\Admin\CariController@show')->name('cari.show');
    Route::get('/cari/edit/{id}', '\App\Http\Controllers\Admin\CariController@edit')->name('cari.edit');
    Route::put('/cari/{id}', '\App\Http\Controllers\Admin\CariController@update')->name('cari.update');
    Route::delete('/cari/{id}', '\App\Http\Controllers\Admin\CariController@destroy')->name('cari.destroy');
    
    //Satış Fatura
    Route::get('/satis', '\App\Http\Controllers\Admin\SatisController@index')->name('satis.index');
    Route::get('/satis/create', '\App\Http\Controllers\Admin\SatisController@create')->name('satis.create');
    Route::post('/satis', '\App\Http\Controllers\Admin\SatisController@store')->name('satis.store');
    Route::get('/satis/{id}', '\App\Http\Controllers\Admin\SatisController@show')->name('satis.show');
    Route::get('/satis/edit/{id}', '\App\Http\Controllers\Admin\SatisController@edit')->name('satis.edit');
    Route::put('/satis/{id}', '\App\Http\Controllers\Admin\SatisController@update')->name('satis.update');
    Route::delete('/satis/{id}', '\App\Http\Controllers\Admin\SatisController@destroy')->name('satis.destroy');

    //Alış Fatura
    Route::get('/alis', '\App\Http\Controllers\Admin\AlisController@index')->name('alis.index');
    Route::get('/alis/create', '\App\Http\Controllers\Admin\AlisController@create')->name('alis.create');
    Route::post('/alis', '\App\Http\Controllers\Admin\AlisController@store')->name('alis.store');
    Route::get('/alis/{id}', '\App\Http\Controllers\Admin\AlisController@show')->name('alis.show');
    Route::get('/alis/edit/{id}', '\App\Http\Controllers\Admin\AlisController@edit')->name('alis.edit');
    Route::put('/alis/{id}', '\App\Http\Controllers\Admin\AlisController@update')->name('alis.update');
    Route::delete('/alis/{id}', '\App\Http\Controllers\Admin\AlisController@destroy')->name('alis.destroy');

    //Gider
    Route::get('/gider', '\App\Http\Controllers\Admin\GiderController@index')->name('gider.index');
    Route::get('/gider/create', '\App\Http\Controllers\Admin\GiderController@create')->name('gider.create');
    Route::post('/gider', '\App\Http\Controllers\Admin\GiderController@store')->name('gider.store');
    Route::get('/gider/{id}', '\App\Http\Controllers\Admin\GiderController@show')->name('gider.show');
    Route::get('/gider/edit/{id}', '\App\Http\Controllers\Admin\GiderController@edit')->name('gider.edit');
    Route::put('/gider/{id}', '\App\Http\Controllers\Admin\GiderController@update')->name('gider.update');
    Route::delete('/gider/{id}', '\App\Http\Controllers\Admin\GiderController@destroy')->name('gider.destroy');

    //Account
    Route::get('/account', '\App\Http\Controllers\Admin\AccountController@index')->name('accounts.index');
    Route::get('/account/create', '\App\Http\Controllers\Admin\AccountController@create')->name('accounts.create');
    Route::post('/account', '\App\Http\Controllers\Admin\AccountController@store')->name('accounts.store');
    Route::get('/account/{id}', '\App\Http\Controllers\Admin\AccountController@show')->name('accounts.show');
    Route::get('/account/edit/{id}', '\App\Http\Controllers\Admin\AccountController@edit')->name('accounts.edit');
    Route::put('/account/{id}', '\App\Http\Controllers\Admin\AccountController@update')->name('accounts.update');
    Route::delete('/account/{id}', '\App\Http\Controllers\Admin\AccountController@destroy')->name('accounts.destroy');

    //Blog
    Route::get('/blog', '\App\Http\Controllers\Admin\BlogController@index')->name('blogs.index');
    Route::get('/blog/create', '\App\Http\Controllers\Admin\BlogController@create')->name('blogs.create');
    Route::post('/blog', '\App\Http\Controllers\Admin\BlogController@store')->name('blogs.store');
    Route::get('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@show')->name('blogs.show');
    Route::get('/blog/edit/{id}', '\App\Http\Controllers\Admin\BlogController@edit')->name('blogs.edit');
    Route::put('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@update')->name('blogs.update');
    Route::delete('/blog/{id}', '\App\Http\Controllers\Admin\BlogController@destroy')->name('blogs.destroy');

    //Category
    Route::get('/category', '\App\Http\Controllers\Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('category.create');
    Route::post('/category', '\App\Http\Controllers\Admin\CategoryController@store')->name('category.store');
    Route::get('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@show')->name('category.show');
    Route::get('/category/edit/{id}', '\App\Http\Controllers\Admin\CategoryController@edit')->name('category.edit');
    Route::put('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', '\App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy');

});
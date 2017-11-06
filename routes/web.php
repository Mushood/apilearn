<?php

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

Route::get('/spa', 'SpaController@index')->name('spa');

Route::get('/blog', 'BlogController@index')->name('blog.store');
Route::get('/blog/{blog}', 'BlogController@show')->name('blog.show');
Route::post('/blog', 'BlogController@store')->name('blog.store');
Route::post('/blog/image', 'BlogController@storeImage')->name('blog.store.image');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

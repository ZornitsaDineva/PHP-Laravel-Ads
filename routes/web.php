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

/* Site */
Route::get('/','SiteController@index');
Route::get('/category','SiteController@index');


/* Site Ajax */
Route::get('/ajax/categories','SiteController@ajaxCategoryModal');
Route::get('/ajax/locations','SiteController@ajaxLocationModal');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

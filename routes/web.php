<?php

/*
|--------------------------------------------------------------------------
| Web Routes /// Route::get('rutaDeFantasia', 'controlador@metodo');
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|--------------------------------------------------------------------------
| VISTAS PRINCIPALES
|--------------------------------------------------------------------------*/
Route::get('/', 'IndexController@index');
Route::get('/partials', 'IndexController@cuantosSomos');
Route::get('/auth', 'ValidacionAjaxController@validadorAjax');
Route::get('faq', 'FaqController@index');
/*--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------*/
Auth::routes();
/*--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------*/
Route::get('profile', 'ProfileController@index')->middleware('auth');
Route::get('profile/products', 'ProfileController@products')->middleware('auth');
Route::get('profile/sales', 'ProfileController@sales')->middleware('auth');
Route::get('profile/{id}', 'ProfileController@show');
// Route::patch('profile', 'ProfileController@update')->middleware('auth');
Route::resource('profile', 'ProfileController');// gon: cambié esto p/meter "publicar" en el mismo controlador
Route::get('/profile', 'ProfileController@showRegistrationForm2');
/*--------------------------------------------------------------------------
| PRODUCTS PUBLIC
|--------------------------------------------------------------------------*/
Route::get('/products', 'ProductsController@index');
Route::get('/products/filter', 'ProductsController@filter');

Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{id}', 'ProductsController@show');
/*--------------------------------------------------------------------------
| PRODUCTS PROFILE
|--------------------------------------------------------------------------*/
Route::get('/create', 'ProductsController@create')->middleware('auth');
Route::post('/create', 'ProductsController@store')->middleware('auth');

Route::get('products/{id}/edit', 'ProductsController@edit')->middleware('auth');
Route::patch('products/{id}update', 'ProductsController@update')->middleware('auth');
// Route::delete('products/{id}', 'ProductsController@destroy');
/*--------------------------------------------------------------------------
| CART/EVENT
|--------------------------------------------------------------------------*/
Route::get('/event', 'CartController@index');
Route::post('/event', 'CartController@checkout');
Route::post('/event/add', 'CartController@add');
Route::post('/event/remove', 'CartController@remove');





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

//////////////////////////////////////////////////////////////

Route::get('/index', 'IndexController@index'); //  Route::get('ruta', 'controlador@metodo'); 

Route::get('faq', 'FaqController@index');

Route::get('login', 'LoginController@index');

Route::get('registro', 'RegistroController@index');

///////////////////agregado x make:auth////////////////////////

Auth::routes();

Route::get('perfil', 'PerfilController@index')->name('perfil');
// Route::get('home', 'PerfilController@index')->name('home'); // reemplacé home por perfil, si me falto reemplazarlo en algun caso, reemplazenlo

//////////////////////////////////////////////////////////////

Route::get('/products', 'ProductsController@index');

Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{id}', 'ProductsController@show');


Route::get('/create', 'ProductsController@create');
Route::post('/create', 'ProductsController@store');


// Route::get('products/create', 'ProductsController@create');
// Route::post('products/create', 'ProductsController@store');

// Route::get('products/{id}/update', 'ProductsController@edit');
// Route::put('products/{id}/update', 'ProductsController@update');

// Route::delete('products/{id}', 'ProductsController@destroy');

/////////////////////////////////////////////////////////////
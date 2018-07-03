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
    return view('home');
});
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'UserController@goAdmin')->name('admin');
Route::get('/super', 'UserController@superAdmin')->name('super');
Route::get('/edit', 'UserController@perfil')->name('edit');
Route::post('/edit/{id}', 'UserController@updateAdmin');
Route::get('/plantilla', 'UserController@diseño');
Route::get('/nuevain', 'InfografiaController@Categoria')->name('nuevain');
Route::post('/nuevacategoria', 'InfografiaController@createCategoria');
Route::resource('catego','CategoriaController');
Route::post('/prueba', 'InfografiaController@probandodatos');






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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();
//Route::get('/','UserController@index')->name('admin');
Route::get('/admin', 'UserController@goAdmin')->name('admin');
Route::get('/super', 'UserController@superAdmin')->name('super');
Route::get('/editar-p', 'UserController@perfil')->name('editar-p');
Route::get('/plantilla1', 'UserController@plantilla1')->name('plantilla1');
Route::get('/plantilla2', 'UserController@plantilla2')->name('plantilla2');




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
Route::get('/home', 'HomeController@index')->name('index');
Route::get('/allcategories', 'HomeController@allCategories')->name('allcategories');

Auth::routes();

Route::group(['prefix'=>'superadmin', 'middleware' => 'notsuperadmin'], function(){
    Route::get('/super', 'UserController@superAdmin')->name('super');
    Route::get('/mail', 'UserController@mail')->name('mail');
    Route::get('/edit-user/{id}', 'UserController@goEditUser');
    Route::get('/drop-user/{id}', 'UserController@dropUserAdmin');
    Route::post('/go-edit', 'UserController@updateUserAdmin');
    //Ajax Home
    Route::get('/getsuscriptores/{id}', 'UserController@getSuscriptores');

});

Route::group(['prefix'=>'useradmin',  'middleware' => 'notuseradmin'], function(){
    Route::get('/admin', 'UserController@goAdmin')->name('admin');
    Route::get('/plantilla', 'UserController@diseño');
    Route::get('/nuevain', 'InfografiaController@Categoria')->name('nuevain');
    Route::get('/publicateinfo/{id}', 'InfografiaController@publicateInfografia')->name('publicateinfo');
    Route::get('/sendtomailinfo/{id}', 'InfografiaController@goToSendInfografia')->name('sendtomailinfo');
    Route::post('/nuevacategoria', 'InfografiaController@createCategoria');
    Route::resource('catego','CategoriaController');
    Route::get('/edit', 'UserController@perfil')->name('edit');
    Route::post('/edit/{id}', 'UserController@updateAdmin');
    Route::post('/prueba', 'InfografiaController@probandodatos')->name('prueba');
    Route::get('/itemsc', 'InfografiaController@items');
    Route::post('/sendplantilla/{id}', 'InfografiaController@plantillaenviada')->name('sendplantilla');
    Route::get('/updateInfo/{id}', 'InfografiaController@updateInfografia')->name('updateInfo');
    Route::post('/templateEditado/{id}', 'InfografiaController@templateeditada')->name('sendplantilla');
    Route::post('/sendtosuscribers', 'InfografiaController@enviarMailSuscritos')->name('sendtosuscribers');
    Route::post('/sendtomail', 'InfografiaController@enviarMail')->name('sendtosuscribers');
    Route::get('/template/{id}', 'InfografiaController@template')->name('template');
    Route::post('/templateEditado/{id}', 'InfografiaController@templateeditada')->name('templateEditado');
    Route::post('/saveUpdateInfografia/{id}', 'InfografiaController@saveUpdateInfografia')->name('saveUpdateInfografia');
    

    //Ajax
    Route::get('/getitems/{id}', 'InfografiaController@getItemsOfCategory');
    Route::post('/saveimg', 'InfografiaController@savePreviewImage');
});

//Ajax Home
Route::get('/getnrosuscriptores/{id}', 'HomeController@getCantidadSuscriptores');
Route::post('/suscribirme', 'HomeController@setSuscribe');








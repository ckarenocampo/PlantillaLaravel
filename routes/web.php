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

//Route::get('/','PagesController@welcome');
//Route::get('registro','PagesController@registro');

Route::match(['get','post'],'/','PagesController@login_admin');

Route::group(['middleware'=>['auth']],function(){
    Route::get('admin','PagesController@admin');
    Route::get('profile','PagesController@profile');
    Route::get('tables','PagesController@tables');
    Route::get('icons','PagesController@icons');
    Route::get('usuarios_agregar','UsuariosController@usuarios_agregar');
    Route::resource('usuarios','UsuariosController');
});

Route::get('logout','PagesController@logout');
Route::resource('register_admin','RegisterController');

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');


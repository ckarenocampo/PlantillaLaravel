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

Route::match(['get','post'],'/','PagesController@login_admin');
Route::get('registro','PagesController@registro');
Route::get('admin','PagesController@admin');
Route::get('profile','PagesController@profile');
Route::get('tables','PagesController@tables');
Route::get('icons','PagesController@icons');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::resource('usuarios','UsuariosController');
//Route::get('formulario','UsuariosController@formulario');
Route::resource('formulario','PagesController');
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

//Route::get('/admin','PagesController@login');

Route::get('registro','PagesController@registro')->name('registro');
Route::get('dashboard','PagesController@dashboard')->name('dashboard');
Route::get('profile','PagesController@profile')->name('profile');
Route::get('tables','PagesController@tables')->name('tables');
Route::get('icons','PagesController@icons')->name('icons');
Route::get('formulario','PagesController@formulario')->name('formulario');
Route::match(['get','post'],'/inicio','PagesController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 
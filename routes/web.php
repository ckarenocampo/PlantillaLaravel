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
    Route::get('logout','PagesController@logout');
    Route::group(['middleware'=>['auth']],function(){
    //Route::get('admin','PagesController@admin');
    Route::match(['get','post'],'perfil','PagesController@perfil');
    Route::get('usuarios_agregar','UsuariosController@usuarios_agregar');
    Route::resource('usuarios','UsuariosController');
    Route::get('data', 'UsuariosController@data');

    Route::get('estudiantes','PagesController@estudiantes');
    Route::get('inscripciones','PagesController@inscripciones');
    //Route::get('inscripcionesporestudiante','PagesController@inscripcionesporestudiante');
    //Route::get('estudiantesporciclo','PagesController@estudiantesporciclo');
    Route::get('aprobadosporciclo','PagesController@aprobadosporciclo');
    Route::get('inscripcionesporciclo','PagesController@inscripcionesporciclo');
    Route::get('retirospormateria','PagesController@retirospormateria');


    Route::get('datosEstudiantes', 'ConsultasController@datosEstudiantes');
    Route::get('datosInscripcion', 'ConsultasController@datosInscripcion');
    Route::get('estudiantesInscritos', 'ConsultasController@estudiantesInscritos');
    Route::get('admin', 'ConsultasController@Totales');
    Route::resource('porcentaje', 'ConsultasController@porcentaje');

// 404 Route Handler
Route::any('{url_param}', function() {
    abort(404, '404 Error. Page not found!');
})->where('url_param', '.*');
});

Route::resource('register_admin','RegisterController');

Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');


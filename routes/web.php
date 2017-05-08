<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard-admin');
});

/*-- Estudiante --*/
Route::get('/register-student', 'UserController@getViewRegisterStudent');

Route::post('/register-student', 'UserController@registerStudent');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'UserController@autoComplete'));

Route::get('/buscar-student', 'UserController@getViewBuscarStudent');

Route::post('/buscar-student', 'UserController@buscarStudent');


/*-- Representante --*/
Route::get('/register-representante', 'RepresentanteController@getViewRegister');

Route::post('/register-representante', 'RepresentanteController@registerRepresentante');

/*-- Seccion --*/
Route::get('/register-seccion', 'SeccionController@getViewRegisterSeccion');

Route::post('/register-seccion', 'SeccionController@registerSeccion');

Route::get('/listar-seccion', 'SeccionController@getListSeccion');

Route::get('/listar-seccion-disable/{id}', 'SeccionController@getDisableSeccion');

Route::get('/listar-seccion-enable/{id}', 'SeccionController@getEnableSeccion');

/*-- Grado --*/
Route::get('/register-grado', 'GradoController@getViewRegisterGrado');

Route::post('/register-grado', 'GradoController@registerGrado');

Route::get('/listar-grado', 'GradoController@listarGrado');

Route::get('/listar-grado-disable/{id}', 'GradoController@getDisableGrado');

Route::get('/listar-grado-enable/{id}', 'GradoController@getEnableGrado');


/*-- Grado Seccion --*/
Route::get('/register-gradoseccion', 'GradoSeccionController@getViewRegisterGradoSeccion');

Route::post('/register-gradoseccion', 'GradoSeccionController@registerGradoSeccion');




/*-- PRUEBA JQUERY --*/
//Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
//Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

//Route::get('/register-representante',array('as'=>'register-representante','uses'=>'RepresentanteController@getViewRegister'));
//Route::get('searchajax',array('as'=>'searchajax','uses'=>'RepresentanteController@autoComplete'));
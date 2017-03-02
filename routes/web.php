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

Route::get('/register-student', 'UserController@getViewRegisterStudent');

Route::post('/register-student', 'UserController@registerStudent');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'UserController@autoComplete'));

/* PRUEBA JQUERY */

//Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
//Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

//Route::get('/register-representante',array('as'=>'register-representante','uses'=>'RepresentanteController@getViewRegister'));
//Route::get('searchajax',array('as'=>'searchajax','uses'=>'RepresentanteController@autoComplete'));
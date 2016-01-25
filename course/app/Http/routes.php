<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'users' => 'UsersController',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('example', function () {

    $user = "Dulio";

    // se utiliza . en vez de / y el nombre de la vista se escribe sin la extencion
    // la funcion compact de php permite convertir las variables en un array asociativo
    return view('examples.template', compact('user'));

});

/**
 * Definir Controlador tipo resource:
 * Evita conflictos entre rutas con el mismo nombre para diferentes usuarios
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => '\Admin'], function () {
    Route::resource('users', 'UsersController');
});


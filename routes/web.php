<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use App\Http\Controllers\AuthorController;

$router->get('/productos', 'ProductoController@index');
$router->get('/productos/{producto}', 'ProductoController@show');
$router->post('/productos', 'ProductoController@store');
$router->put('/productos/{producto}', 'ProductoController@update');
$router->patch('/productos/{producto}', 'ProductoController@update');
$router->delete('/productos/{producto}', 'ProductoController@destroy');


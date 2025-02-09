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

$router->get('/copies','CopyController@index');
$router->post('/copies','CopyController@store');
$router->get('/copies/{copy}','CopyController@show');
$router->put('/copies/{copy}','CopyController@update');
$router->patch('/copies/{copy}','CopyController@update');
$router->delete('/copies/{copy}','CopyController@destroy');

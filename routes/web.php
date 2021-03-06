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


$router->group(['prefix' => 'api'], function() use ($router) {

    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');

    $router->group(['middleware' => 'auth'], function() use ($router) {

        $router->post('/logout', 'AuthController@logout');
        $router->get('/assets','AssetController@index');
        $router->post('/assets','AssetController@store');
        $router->get('/assets/{id}','AssetController@show');
        $router->put('/assets/{id}','AssetController@update');
        $router->delete('/assets/{id}','AssetController@destroy');

    });
    
});
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

$router->group(['prefix' => 'users'], function() use ($router) {
    $router->post('/login', 'UserController@login');

    /**
     * User credentials protected routes;
     */
    $router->group(['middleware' => 'auth:api'], function() use ($router) {
        $router->get('/me', 'UserController@me');
        $router->post('/logout', 'UserController@logout');
    });
});

$router->group(['middleware' => 'client.credentials'], function() use ($router) {
    /**
     * Authors' routes
     */
    $router->group(['prefix' => 'authors'], function() use ($router) {
        $router->get('/', 'AuthorController@index');
        $router->post('/', 'AuthorController@store');
        $router->get('/{id}', 'AuthorController@show');
        $router->put('/{id}', 'AuthorController@update');
        $router->patch('/{id}', 'AuthorController@update');
        $router->delete('/{id}', 'AuthorController@destroy');
    });

    /**
     * Books' routes
     */
    $router->group(['prefix' => 'books'], function() use ($router) {
        $router->get('/', 'BookController@index');
        $router->post('/', 'BookController@store');
        $router->get('/{id}', 'BookController@show');
        $router->put('/{id}', 'BookController@update');
        $router->patch('/{id}', 'BookController@update');
        $router->delete('/{id}', 'BookController@destroy');
    });

    /**
     * Books' routes
     */
    $router->group(['prefix' => 'users'], function() use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('/{id}', 'UserController@show');
        $router->put('/{id}', 'UserController@update');
        $router->patch('/{id}', 'UserController@update');
        $router->delete('/{id}', 'UserController@destroy');
    });
});

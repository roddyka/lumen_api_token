<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'prefix' => 'auth'
], function () use ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');
    // Matches "/api/login
   $router->post('login', 'AuthController@login');

   // Matches "/api/profile
   $router->get('profile', 'UserController@profile');

   // Matches "/api/users/1 
   //get one user by id
   $router->get('users/{id}', 'UserController@singleUser');

   // Matches "/api/users
   $router->get('users', 'UserController@allUsers');


   //api connect Notion (i need create a controller to connect)
   //list databases
   $router->get("databases", 'NotionController@allDatabases');
    //create databases
   $router->post("databases", 'NotionController@createDatabases');
    //create update dabatase (patch or put)
   $router->put("databases", 'NotionController@updateDatabases');
});

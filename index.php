<?php

spl_autoload_register();

use Api\Router;
use Api\Controllers\UsersController;

//initialize array of data
$data = array(
        'firstName' => 'John',
        'lastName' => 'Locke',
        'password' => 'secret',
        'email' => 'test@email.com',
    );


$UsersController = new UsersController();
$UsersController->createUser(json_encode($data));


$router = new Router();

$router->get(array('/Api/user/read','UsersController@readUser'));

$router->execute();



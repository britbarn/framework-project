<?php

spl_autoload_register();

use Api\Core\Bootstrap;
use Api\Router;
use Api\Controllers\UsersController;




//test code to make sure a database connection can be made
// $user = new User();
// $thisUser = $user->readUser(3);
// var_dump($thisUser);


// now to start testing controller method


$data = array(
        'firstName' => 'testupdate!',
        'lastName' => 'testingupdate',
        'password' => 'secret',
        'email' => 'test@email.com',
    );


$UsersController = new UsersController();
$UsersController->createUser(json_encode($data));
// $UsersController->deleteUser(45);





$router = new Router();

$router->post(array('/Api/user/read/','UsersController'));
$router->delete(array('/Api/user/delete/1','UsersController@deleteUser'));

$router->execute();



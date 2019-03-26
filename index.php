<?php

spl_autoload_register();
var_dump(new Api\User);


use Api\Core\Bootstrap;
use Api\Router;



//test code to make sure a database connection can be made
// $user = new User();
// $thisUser = $user->readUser(3);
// var_dump($thisUser);


// now to start testing controller method


$data = array(
		'id' => '47',
        'firstName' => 'testupdate!',
        'lastName' => 'testingupdate',
        'password' => 'secret',
        'email' => 'test@email.com',
    );


// $UsersController->updateUser(json_encode($data));
// $UsersController->deleteUser(45);




$router = new Router();

$router->get(array('/Api/user/read/{$id}','UsersController'));
$router->delete(array('/Api/user/delete/1','UsersController@deleteUser'));

$router->execute();



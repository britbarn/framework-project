<?php

require 'Core/Bootstrap.php';


//test code to make sure a database connection can be made
// $user = new User();
// $thisUser = $user->readUser(3);
// var_dump($thisUser);


// now to start testing controller method


$data = array(
		'id' => '6',
        'firstName' => 'testupdate!',
        'lastName' => 'testingupdate',
        'password' => 'secret',
        'email' => 'test@email.com',
    );


$UsersController->updateUser(json_encode($data));
// $UsersController->deleteUser(45);








<?php

/*
** file to store common required files throughout the app
** as well as set up application variables
*/

//pull in the core files
require 'Core/Database/Connection.php';

require_once 'User.php';

include('Controllers/UsersController.php');


$UsersController = new UsersController();

$connection = Connection::getConnection();



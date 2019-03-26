<?php

namespace Api\Core;

use Api\User;
use Api\Controllers\UsersController;
use Api\Core\Database\Connection;
/*
** file to store common required files throughout the app
** as well as set up application variables
*/

$UsersController = new UsersController();

$connection = Connection::getConnection();



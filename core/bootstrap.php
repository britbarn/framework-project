<?php

/*
** file to store common required files throughout the app
** as well as set up application variables
*/

//pull in the core files
require 'core/database/Connection.php';
require 'core/database/Queries.php';
require 'User.php';

$connection = Connection::getConnection();



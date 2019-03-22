<?php

require 'core/database/Connection.php';
require 'core/database/Queries.php';

//initialize app array to store application data
$app = [];

//set the array in config.php to the config key in app array
$app['config'] = require 'config.php';

$app['database'] = new QueryBuilder(
	//inject pdo connection into query builder
    Connection::make($app['config']['database'])
);

//utilize query builder to select all users
$users = $app['database']->selectAll('users');


//display user names for proof of concept
foreach ($users as $user) {
	echo $user->name;
}








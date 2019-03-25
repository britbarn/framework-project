<?php

require 'core/bootstrap.php';

//test code to make sure a database connection can be made
$user = new User();
$thisUser = $user->readUser(3);
var_dump($thisUser);










<?php


// require 'Core/Database/Connection.php';
// require 'User.php';

class UsersController
{

	public function getUser($id)
	{
		//get user from the user class
		$user = User::readUser($id);
		var_dump(json_encode($user));
	}

	public function createUser($json)
	{
		$data = json_decode($json);

		$user = User::createUser($data);
		var_dump($user);
	}

	//takes in user information including id and updates row by id
	//returns json of new user info
	public function updateUser($json)
	{
		$data = json_decode($json);

		$result = User::updateUser($data);
		if ($result == 1) {
			$response = json_encode(array(
				'status' => 'success'
    		));
		}
		else {
			$response = json_encode(array(
				'status' => 'error',
				'message'=> 'No record found'
    		));
		}

		var_dump($response);

	}

	// accepts user id and returns json error or success messages
	public function deleteUser($id)
	{
		$result = User::deleteUser($id);
		if ($result == 1) {
			$response = json_encode(array(
				'status' => 'success'
    		));
		}
		else {
			$response = json_encode(array(
				'status' => 'error',
				'message'=> 'No record found'
    		));
		}

		var_dump($response);

		JsonView::render($data);
	}
}
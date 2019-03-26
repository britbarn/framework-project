<?php 
namespace Api;
/**
 *  Model for User
 */

class User 
{
	public $email;
    public $firstName;
    public $lastName;
    public $password;

    //accepts user data array and returns newly created user id
     public function createUser($data)
    {

        $row = [
            'name' => $data->firstName,
            'lastName' => $data->lastName,
            'email' => $data->email,
            'password' =>  password_hash($data->password, PASSWORD_DEFAULT)
        ];

        $pdo = Connection::getConnection();

        $query = $pdo->prepare("INSERT INTO users SET name=:name, lastName=:lastName, email=:email, password=:password")->execute($row);

        return $pdo->lastInsertId();

    }

    // accepts the id of desired user data and returns record as an object
    public function readUser($id)
    {

    	$pdo = Connection::getConnection();

        $query = $pdo->prepare("select * from users where id = {$id}");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    // accepts all data for user and updates by id
    public function updateUser($data)
    {

        $row = [
            'id' => $data->id,
            'name' => $data->firstName,
            'lastName' => $data->lastName,
            'email' => $data->email,
            'password' =>  password_hash($data->password, PASSWORD_DEFAULT)
        ];

        $pdo = Connection::getConnection();

        $query = $pdo->prepare("UPDATE users SET name=:name, lastName=:lastName, email=:email, password=:password WHERE id=:id;");

        // return $query;
        $query->execute($row);

		$count = $query->rowCount();

        return $count;
    }

    // accepts user id and deletes row. returns true or false
    public function deleteUser($id)
    {
    	$pdo = Connection::getConnection();

        // $query = $pdo->prepare("DELETE FROM users WHERE id=$id")->execute();
        $query = $pdo->prepare("DELETE FROM users WHERE id = {$id}");
		$query->execute();

		$count = $query->rowCount();

        return $count;
    }

}
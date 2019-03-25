<?php 

/**
 *  Model for User
 */

class User 
{
	public $email;
    public $firstName;
    public $lastName;
    public $password;

     public static function createUser($firstName, $lastName, $email, $password)
    {
        $row = [
            'name' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' =>  password_hash($password, PASSWORD_DEFAULT)
        ];

        $pdo = Connection::getConnection();

        $query = $pdo->prepare("INSERT INTO users SET name=:name, lastName=:lastName, email=:email, password=:password")->execute($row);

        return $query;

    }

    public static function readUser($id)
    {

    	$pdo = Connection::getConnection();

        $query = $pdo->prepare("select * from users where id = {$id}");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public static function updateUser($id, $firstName, $lastName, $email, $password)
    {
        $row = [
            'id' => $id,
            'name' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' =>  password_hash($password, PASSWORD_DEFAULT)
        ];

        $pdo = Connection::getConnection();

        $query = $pdo->prepare("UPDATE users SET name=:name, lastName=:lastName, email=:email, password=:password WHERE id=:id;")->execute($row);

        return $query;
    }

    public static function deleteUser($id)
    {
    	$pdo = Connection::getConnection();

        $query = $pdo->prepare("DELETE FROM users WHERE id=$id")->execute();
        
        return $query;
    }


}
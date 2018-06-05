<?php

class UserModel extends Model {

public function getLoginInfo() { 

        if (session_status() !== PHP_SESSION_ACTIVE){
			session_start();
			session_regenerate_id();
		}

		if (isset($_SESSION['user'])){
            
			$user = $_SESSION['user'];
			return $user;
		}
    }
   
    public function getOneByEmail($email) 
	{
		$query =
			'SELECT
				id, email, passwordHash
			FROM
				users
			WHERE
				email = ?
			
			';
		$resultSet = $this -> getDBConnection() -> prepare($query);
	$resultSet -> execute([$email]);
		$user = $resultSet -> fetch();
		return $user;
	}
}


<?php 

abstract class Model
{
	const DSN = DB_DSN;
	const USER_NAME = DB_USER_NAME;
	const PASSWORD = DB_PASSWORD;

	private static $PDOInstance;
	protected function getDBConnection() 
	{
		if (self::$PDOInstance == null)
		{
			self::$PDOInstance = new PDO(
			self::DSN,
			self::USER_NAME,
			self::PASSWORD,
			[
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			]
			);
			var_dump('Connexion GOOD!');
		}
		
		return self::$PDOInstance;
	}
}

 ?>
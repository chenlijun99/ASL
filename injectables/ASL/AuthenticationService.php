<?php

namespace ASL;

class AuthenticationService extends \Framework\Injectable
{
	private $queryUserByEmail;

	public function __construct() 
	{
		parent::inject("ASL\DatabaseService as DatabaseService");

		session_start();

		$this->queryUserByEmail =
		 	$this->DatabaseService->prepare("SELECT * FROM Users WHERE email = :email");
	}

	public function isAuthenticated() 
	{
		return isset($_SESSION["user"]);
	}

	public function login(array $credentials) 
	{
		//$credentials["password"] = password_hash($credentials["password"], PASSWORD_DEFAULT);
		$this->queryUserByEmail->execute($credentials);
		$result = $this->queryUserByEmail->fetchAll();
	}

	public function logout() 
	{

	}

	public function is($role) 
	{

	}
}
?>

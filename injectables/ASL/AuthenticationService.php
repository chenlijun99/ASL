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

	public function isAuthenticatedAs(...$roles) 
	{
		if ($this->isAuthenticated()) {
			$userRole = $_SESSION["user"]["role"];
			foreach ($roles as $role) {
				if ($userRole === $role) {
					return true;
				}
			}
		}
		return false;
	}

	public function login(array $credentials) 
	{
		$this->queryUserByEmail->execute($credentials);
		$user = $this->queryUserByEmail->fetchAll();
		if (!empty($user)) {
			$user = $user[0];
			$verified = password_verify($credentials["password"], $user["password"]);

			if ($verified === TRUE) {
				$_SESSION["user"] = $user;
			}

			return $verified;
		}
		return false;
	}

	public function logout() 
	{
		unset($_SESSION["user"]);
	}

	public function is($role) 
	{

	}
}
?>

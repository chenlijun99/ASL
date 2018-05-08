<?php

namespace ASL;

class UserService extends \Framework\Injectable
{
	private $insert;
	private $getUserByEmail;

	public function __construct() 
	{
		parent::inject(
			"ASL\\DatabaseService as db",
			"ASL\\ProfileService as ProfileService"
		);

		$this->getUserByEmail =
		 	$this->db->prepare("SELECT * FROM Users WHERE email = :email");
		$this->insert =
			$this->db->prepare("INSERT INTO Users (email, password, role) 
			VALUES(:email, :password, :role)");
	}

	public function register(array $user, array $profile) 
	{
		try {
			$user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);

			$this->db->beginTransaction();

			$userId = $this->insert($user);

			$profile["account"] = $userId;

			$this->ProfileService->insert($profile);
			$this->ProfileService->role($user["role"])->insert($profile);

			$this->db->commit();
			return $userId;
		} catch (PDOException $e) {
			$this->db->rollBack();
			throw $e;
		}
	}

	public function insert(array $user)
	{
		$this->insert->execute($user);
		return $this->db->lastInsertId();
	}

	public function getByEmail(string $email)
	{
		$this->getUserByEmail->execute(array("email" => $email));
		return $this->getUserByEmail->fetchAll();
	}
}
?>

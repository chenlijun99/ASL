<?php

namespace ASL;

class UserService extends \Framework\Injectable
{
	private $insertUser;
	private $getUserByEmail;

	function __construct() 
	{
		parent::inject(
			"ASL\\DatabaseService as db",
			"ASL\\TeacherService as TeacherService",
			"ASL\\StudentService as StudentService"
		);

		$this->getUserByEmail =
		 	$this->db->prepare("SELECT * FROM Users WHERE email = :email");
		$this->insertUser =
			$this->db->prepare("INSERT INTO Users (email, password, role) 
			VALUES(:email, :password, :role)");
	}

	function register(array $user, array $profile) 
	{
		try {
			$user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);

			$this->db->beginTransaction();

			$this->insertUser->execute($user);
			$id = $this->db->lastInsertId();
			$profile["account"] = $id;
			if ($user["role"] === "teacher") {
				$this->TeacherService->insert($profile);
			} else if ($user["role"] === "student") {
				$this->StudentService->insert($profile);
			}

			$this->db->commit();
			return true;
		} catch (PDOException $e) {
			$this->db->rollBack();
			throw $e;
		}
	}

	function getByEmail(string $email)
	{
		$this->getUserByEmail->execute(array("email" => $email));
		return $this->getUserByEmail->fetchAll();
	}
}
?>
